<?php

namespace App\Http\Controllers;

use App\Article;
use App\Email;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class FRegisterController extends Controller
{
    public function index() {
        $lang = \App::getLocale();
        $pendaftaran = Article::where('link', \Lang::get('route.pendaftaran',[], $lang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $lang)->firstOrFail();

        $alt_langs = array_diff(config('app.all_langs'), array($lang));
        $altlink = [];
        foreach ($alt_langs as $altlang) {
            $altarticle = Article::where('link', \Lang::get('route.pendaftaran',[], $altlang))->where('position', 'menu-utama')->where('published', '1')->where('lang', $altlang)->select('link', 'slug')->first();
            $altprefix = $altlang;
            if (!empty($altarticle)) {
                $altlink[$altlang] = url(preg_replace('#/+#','/', $altprefix.'/'.$altarticle->link));
            } else {
                $altlink[$altlang] = '#';
            }
        }
        $altlink = json_encode($altlink);
        return view('front.pendaftaran', compact('pendaftaran', 'altlink'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|in:L,P',
            'agama' => 'required|in:'.implode(',', Pendaftaran::allowedAgama()),
            'alamat_asal' => 'required',
            'no_tlp' => 'required',
            'alamat_denpasar' => 'required',
            'asal_sekolah' => 'required',
            'tahun_kelulusan' => 'required',
            'nisn' => 'required',
            'jurusan' => 'required',
            'alamat_sekolah' => 'required',
            'jumlah_nilai_un' => 'required',
            'jumlah_mapel_un' => 'required|integer',
            'jumlah_nilai_sttb' => 'required',
            'jumlah_mapel' => 'required|integer',
            'nama_ortu' => 'required',
            'alamat_ortu' => 'required',
            'no_tlp_ortu' => 'required',
            'pekerjaan_ortu' => 'required|in:'.implode(',', Pendaftaran::allowedPekerjaan()),
            'penghasilan_ortu' => 'required|in:'.implode(',', Pendaftaran::allowedPenghasilan()),
            'file_photo' => 'required|mimes:jpeg,png|max:1024',
            'info_btc' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data = $request->only('nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jk', 'agama', 'alamat_asal', 'alamat_asal',
            'rt_rw', 'no_tlp', 'alamat_denpasar', 'asal_sekolah', 'tahun_kelulusan', 'nisn', 'jurusan', 'alamat_sekolah',
            'jumlah_nilai_un', 'jumlah_mapel_un', 'jumlah_nilai_sttb', 'jumlah_mapel', 'nama_ortu', 'alamat_ortu', 'alamat_ortu',
            'no_tlp_ortu', 'pekerjaan_ortu', 'penghasilan_ortu');
        $data['status'] = 'waiting-confirmation';
        if ($request->hasFile('file_photo')) {
            $data['file_photo'] = $this->saveAttachment($request->file('file_photo'), $request->nama_lengkap);
        }
        $infobtc = '';
        $masterinfo = Pendaftaran::infoBTCList();
        foreach ($request->info_btc as $info) {
            $infobtc .= ' '.$masterinfo[$info][config('app.default_locale')].',';
        }
        $infobtc = rtrim($infobtc, ',');
        $data['info_btc'] = $infobtc;
        $pendaftaran = Pendaftaran::create($data);

        $emails = Email::where('receipt',1)->get();
        $dataemail = $data;
        $dataemail['human_agama'] = $pendaftaran->human_agama;
        $dataemail['human_jurusan'] = $pendaftaran->human_jurusan;
        $dataemail['human_pekerjaan_ortu'] = $pendaftaran->human_pekerjaan_ortu;
        $dataemail['human_penghasilan_ortu'] = $pendaftaran->human_penghasilan_ortu;

        foreach($emails as $email) {
            \Mail::send('emails.register', $dataemail, function ($mail) use ($data, $email)
            {
                $mail->to($email->email, $email->name);
                $mail->subject('Pendaftaran BTC ('.$data['nama_lengkap'].')');
            });
        }
        \Session::flash('notification', ['level' => 'success', 'message' => \Lang::get('front.success-register',[], \App::getLocale())]);
        return back();
    }

    protected function saveAttachment(UploadedFile $file, $nama)
    {
        $fileName = str_slug($nama).'-'. date("Ymd").'.'.$file->getClientOriginalExtension();
        \Storage::disk('photoregister')->put($fileName, file_get_contents($file));
        return $fileName;
    }
}
