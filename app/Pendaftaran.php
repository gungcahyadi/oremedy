<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = [
        'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jk', 'agama', 'alamat_asal',
        'rt_rw', 'no_tlp', 'alamat_denpasar', 'asal_sekolah', 'tahun_kelulusan', 'nisn',
        'jurusan', 'alamat_sekolah', 'jumlah_nilai_un', 'jumlah_mapel_un', 'jumlah_nilai_sttb',
        'jumlah_mapel', 'nama_ortu', 'alamat_ortu', 'no_tlp_ortu', 'pekerjaan_ortu', 'penghasilan_ortu',
        'info_btc', 'file_photo', 'status'
    ];

    public static function agamaList()
    {
        return [
            'hindu' => 'Hindu',
            'islam' => 'Islam',
            'kristen' => 'Kristen',
            'katolik' => 'Katolik',
            'budha' => 'Budha',
            'kong-hu-cu' => 'Kong Hu Cu'
        ];
    }

    public function getHumanAgamaAttribute()
    {
        return static::agamaList()[$this->agama];
    }

    public static function allowedAgama()
    {
        return array_keys(static::agamaList());
    }

    public static function jurusanList()
    {
        return [
            'ipa' => 'IPA',
            'ips' => 'IPS',
            'bahasa' => 'Bahasa',
            'tb' => 'TB',
            'th' => 'TH',
            'tg' => 'TG',
            'upw' => 'UPW',
            'lain-lain' => 'Lain-lain'
        ];
    }

    public function getHumanJurusanAttribute()
    {
        return static::jurusanList()[$this->jurusan];
    }

    public static function allowedJurusan()
    {
        return array_keys(static::jurusanList());
    }

    public static function pekerjaanOrtuList()
    {
        return [
            'pns' => 'PNS',
            'abri' => 'ABRI',
            'pegawai-swasta' => 'Pegawai Swasta',
            'wirausaha' => 'Wirausaha',
            'lain-lain' => 'Lain-lain'
        ];
    }

    public function getHumanPekerjaanOrtuAttribute()
    {
        return static::pekerjaanOrtuList()[$this->pekerjaan_ortu];
    }

    public static function allowedPekerjaan()
    {
        return array_keys(static::pekerjaanOrtuList());
    }

    public static function penghasilanOrtuList()
    {
        return [
            '1.5jt-3jt' => '1.500.000 - 3.000.000',
            '3jt-5jt' => '3.000.000 - 5.000.000',
            'lebih-dari-5jt' => '> 5.000.000',
        ];
    }

    public function getHumanPenghasilanOrtuAttribute()
    {
        return static::penghasilanOrtuList()[$this->penghasilan_ortu];
    }

    public static function allowedPenghasilan()
    {
        return array_keys(static::penghasilanOrtuList());
    }

    public static function infoBTCList()
    {
        return [
            'sekolah' => ['id' => 'Sekolah', 'en' => 'School'],
            'surat-kabar' => ['id' => 'Surat Kabar', 'en' => 'Newspaper'],
            'radio' => ['id' => 'Radio', 'en' => 'Radio'],
            'brosur' => ['id' => 'Brosur', 'en' => 'Brochure'],
            'spanduk' => ['id' => 'Spanduk', 'en' => 'Banner'],
            'teman-saudara' => ['id' => 'Teman/Saudara', 'en' => 'Friend/Family'],
            'media-sosial' => ['id' => 'Media Sosial', 'en' => 'Social Media']
        ];
    }

    public static function allowedInfo()
    {
        return array_keys(static::infoBTCList());
    }

    public static function statusList()
    {
        return [
            'waiting-confirmation' => 'Waiting Confirmation',
            'confirmed' => 'Confirmed',
        ];
    }

    public static function statusLabel()
    {
        return [
            'waiting-confirmation' => 'label-warning',
            'confirmed' => 'label-success'
        ];
    }

    public function getHumanStatusAttribute()
    {
        return static::statusList()[$this->status];
    }

    public function getLabelStatusAttribute()
    {
        return static::statusLabel()[$this->status];
    }

    public static function allowedStatus()
    {
        return array_keys(static::statusList());
    }
}
