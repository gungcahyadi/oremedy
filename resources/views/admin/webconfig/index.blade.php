@extends('layouts.back')

@section('page-heading')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Web Configuration</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Manage Main Menu</span>
            </li>
        </ul>
    </div>
    <h3 class="page-title"> Manage Main Menu</h3>
@endsection

@section('conten')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase"> Main Menu</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <td width="20" class="text-center">No</td>
                            <td>Menu</td>
                            <td class="text-center col-md-1">SEO</td>
                            <td class="text-center col-md-2">Content</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bmenus as $menu)
                            <tr>
                                <td class="text-center">{{ $no }}</td>
                                <td>{{ $menu->title }}</td>
                                <td class="text-center">
                                    <span class="tooltips" data-original-title="Edit">
                                        <a href="{{ route('menu-utama.edit', $menu->equal_id) }}" class="btn btn-icon-only blue"><i class="fa fa-thumbs-o-up"></i></a>
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($menu->more_config == 1)
                                        @if(isset($menuconfig[$menu->link]))
                                            @foreach($menuconfig[$menu->link] as $mconfig)
                                                @if($mconfig['type'] == 'data')
                                                    <span class="tooltips" data-original-title="Data {{ $mconfig['tooltip'] }}">
                                                        <a href="{{ url('admin/config/'.$mconfig['link']) }}" class="btn btn-icon-only green"><i class="fa fa-table"></i></a>
                                                    </span>
                                                @elseif($mconfig['type'] == 'image')
                                                    <span class="tooltips" data-original-title="Image {{ $mconfig['tooltip'] }}">
                                                        <a href="{{ url('admin/config/'.$mconfig['link']) }}" class="btn btn-icon-only purple-wisteria"><i class="fa fa-image"></i></a>
                                                    </span> 
                                                @elseif($mconfig['type'] == 'dataandimage')
                                                    <span class="tooltips" data-original-title="Data {{ $mconfig['tooltip'] }}">
                                                        <a href="{{ url('admin/config/'.$mconfig['link']) }}" class="btn btn-icon-only green"><i class="fa fa-table"></i></a>
                                                    </span>
                                                    <span class="tooltips" data-original-title="Image {{ $mconfig['tooltip'] }}">
                                                        <a href="{{ url('admin/config/'.$mconfig['link']) }}" class="btn btn-icon-only purple-wisteria"><i class="fa fa-image"></i></a>
                                                    </span>                                                
                                                @endif
                                            @endforeach
                                        @endif

                                        @if($menu->childs()->where('position', 'page')->where('lang', config('app.default_locale'))->count() > 0)
                                            <span class="tooltips" data-original-title="Edit {{ $menuconfig[$menu->link][0]['tooltip'] }}">
                                                <a href="{{ url('admin/config/'.$menuconfig[$menu->link][0]['link']) }}" class="btn btn-icon-only yellow-gold"><i class="fa fa-pencil"></i></a>
                                            </span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection