@extends('layouts.back')

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Web Configuration</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>File Manager</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> File Manager</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ url('ckeditor/filemanager/dialog.php?type=0&akey='.md5('goestoe_ari_2905')) }}"></iframe>
            </div>
        </div>
    </div>
@endsection