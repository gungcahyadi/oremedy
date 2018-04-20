@extends('layouts.front')

@section('custom-css')
    <link href="{{ asset('assets/front/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('custom-js')
    <script src="{{ asset('assets/front/plugins/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/front/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/front/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
    <script>
        $('.date-picker').datepicker({
            autoclose: true,
            endDate: '+0d',
            format: 'yyyy-mm-dd'
        });

        $(".maskdate").inputmask("y-m-d", {
            autoUnmask: true
        });

        $(".maskyear").inputmask("y", {
            autoUnmask: true
        });
    </script>
@endsection

@section('page-head-seo')
    <meta name="description" content="{{ $pendaftaran->meta_description }}">
    <meta name="keywords" content="{{ $pendaftaran->meta_keyword }}">
    <title>{{ $pendaftaran->meta_title }} - Bali Tourism College</title>
@endsection

@section('conten')
    <!--Page Header-->
    <section class="page_header padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <h1>{{ $pendaftaran->title }}</h1>
                    <div class="page_nav">
                        <span>{{ \Lang::get('front.breadcumsdesc',[], \App::getLocale()) }}:</span> <a href="{{ url('/'.config('app.locale_prefix')) }}">{{ \Lang::get('front.rootmenu',[], \App::getLocale()) }}</a> <span><i class="fa fa-angle-double-right"></i>{{ $pendaftaran->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header-->


    <!--ABout US-->
    <section id="about" class="padding">
        <div class="container aboutus">
            <div class="row">
                <div class="col-md-12 wow fadeInLeft" data-wow-delay="200ms">
                    <h2 class="heading heading_space">{{ $pendaftaran->title }} <span class="divider-left"></span></h2>
                    @include('_flash_notification_message')
                    {!! Form::open(['url' => url(preg_replace('#/+#','/', config('app.locale_prefix').'/'.\Lang::get('route.pendaftaran',[], \App::getLocale()))), 'class' => 'form-horizontal', 'files' => true])!!}
                    <div class="form-group {!! $errors->has('nama_lengkap') ? 'has-error' : '' !!}">
                        {!! Form::label('nama_lengkap', \Lang::get('front.nama-lengkap',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('nama_lengkap', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('nama_lengkap', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('tempat_lahir') ? 'has-error' : '' !!}">
                        {!! Form::label('tempat_lahir', \Lang::get('front.tempat-lahir',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('tempat_lahir', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('tempat_lahir', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('tanggal_lahir') ? 'has-error' : '' !!}">
                        {!! Form::label('tanggal_lahir', \Lang::get('front.tanggal-lahir',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('tanggal_lahir', null, ['class'=>'form-control date-picker maskdate']) !!}
                            {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('jk') ? 'has-error' : '' !!}">
                        {!! Form::label('jk', \Lang::get('front.jk',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10 radio-list">
                            <label class="radio-inline">{{ Form::radio('jk', 'L', true) }} {{ \Lang::get('front.jkl',[], \App::getLocale()) }}</label>
                            <label class="radio-inline">{{ Form::radio('jk', 'P', false) }} {{ \Lang::get('front.jkp',[], \App::getLocale()) }}</label>
                            {!! $errors->first('jk', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('agama') ? 'has-error' : '' !!}">
                        {!! Form::label('agama', \Lang::get('front.agama',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('agama', ['' => '']+App\Pendaftaran::agamaList(), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('alamat_asal') ? 'has-error' : '' !!}">
                        {!! Form::label('alamat_asal', \Lang::get('front.alamat-asal',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('alamat_asal', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('alamat_asal', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {!! $errors->has('rt_rw') ? 'has-error' : '' !!}">
                        {!! Form::label('rt_rw', \Lang::get('front.rt-rw',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('rt_rw', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('rt_rw', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('no_tlp') ? 'has-error' : '' !!}">
                        {!! Form::label('no_tlp', \Lang::get('front.no_tlp',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('no_tlp', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('no_tlp', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('alamat_denpasar') ? 'has-error' : '' !!}">
                        {!! Form::label('alamat_denpasar', \Lang::get('front.alamat-denpasar',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('alamat_denpasar', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('alamat_denpasar', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('asal_sekolah') ? 'has-error' : '' !!}">
                        {!! Form::label('asal_sekolah', \Lang::get('front.asal-sekolah',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('asal_sekolah', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('asal_sekolah', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {!! $errors->has('tahun_kelulusan') ? 'has-error' : '' !!}">
                        {!! Form::label('tahun_kelulusan', \Lang::get('front.tahun-lulus',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('tahun_kelulusan', null, ['class'=>'form-control maskyear']) !!}
                            {!! $errors->first('tahun_kelulusan', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('nisn') ? 'has-error' : '' !!}">
                        {!! Form::label('nisn', 'NISN', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('nisn', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('nisn', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('jurusan') ? 'has-error' : '' !!}">
                        {!! Form::label('jurusan', \Lang::get('front.jurusan',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('jurusan', ['' => '']+App\Pendaftaran::jurusanList(), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('jurusan', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('alamat_sekolah') ? 'has-error' : '' !!}">
                        {!! Form::label('alamat_sekolah', \Lang::get('front.alamat-sekolah',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('alamat_sekolah', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('alamat_sekolah', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('jumlah_nilai_un') ? 'has-error' : '' !!}">
                        {!! Form::label('jumlah_nilai_un', \Lang::get('front.jnilai-un',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('jumlah_nilai_un', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('jumlah_nilai_un', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('jumlah_mapel_un') ? 'has-error' : '' !!}">
                        {!! Form::label('jumlah_mapel_un', \Lang::get('front.jmapel-un',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('jumlah_mapel_un', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('jumlah_mapel_un', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('jumlah_nilai_sttb') ? 'has-error' : '' !!}">
                        {!! Form::label('jumlah_nilai_sttb', \Lang::get('front.jnilai-sttb',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('jumlah_nilai_sttb', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('jumlah_nilai_sttb', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('jumlah_mapel') ? 'has-error' : '' !!}">
                        {!! Form::label('jumlah_mapel', \Lang::get('front.jmapel',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('jumlah_mapel', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('jumlah_mapel', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('nama_ortu') ? 'has-error' : '' !!}">
                        {!! Form::label('nama_ortu', \Lang::get('front.nama-ortu',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('nama_ortu', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('nama_ortu', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('alamat_ortu') ? 'has-error' : '' !!}">
                        {!! Form::label('alamat_ortu', \Lang::get('front.alamat-ortu',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('alamat_ortu', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('alamat_ortu', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('no_tlp_ortu') ? 'has-error' : '' !!}">
                        {!! Form::label('no_tlp_ortu', \Lang::get('front.tlp-ortu',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('no_tlp_ortu', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('no_tlp_ortu', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('pekerjaan_ortu') ? 'has-error' : '' !!}">
                        {!! Form::label('pekerjaan_ortu', \Lang::get('front.pekerjaan-ortu',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('pekerjaan_ortu', ['' => '']+App\Pendaftaran::pekerjaanOrtuList(), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('pekerjaan_ortu', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('penghasilan_ortu') ? 'has-error' : '' !!}">
                        {!! Form::label('penghasilan_ortu', \Lang::get('front.penghasilan-ortu',[], \App::getLocale()), ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('penghasilan_ortu', ['' => '']+App\Pendaftaran::penghasilanOrtuList(), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('penghasilan_ortu', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('file_photo') ? 'has-error' : '' !!}">
                        {!! Form::label('file_photo', 'File Photo (png/jpg)', ['class' => 'control-label col-sm-2']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('file_photo') !!}
                            {!! $errors->first('file_photo', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('info_btc') ? 'has-error' : '' !!}">
                        <div class="col-md-offset-2 col-md-10">
                            {!! Form::label('info_btc', \Lang::get('front.info-btc',[], \App::getLocale())) !!}
                            <div>
                                @foreach(\App\Pendaftaran::infoBTCList() as $index => $value)
                                <label class="checkbox-inline">
                                    <input name="info_btc[]" type="checkbox" value="{!! $index !!}">{{ $value[\App::getLocale()] }}
                                </label>
                                @endforeach
                            </div>
                            {!! $errors->first('info_btc', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-offset-2 col-md-10">
                            {!! app('captcha')->render() !!}
                            {!! Form::submit(\Lang::get('front.btn-register',[], \App::getLocale()), ['class' => 'btn_common yellow', 'style' => 'padding-right: 15px; padding-left: 15px;']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
    <!--ABout US-->
@endsection