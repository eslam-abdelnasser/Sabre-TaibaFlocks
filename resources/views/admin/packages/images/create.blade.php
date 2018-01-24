@extends('admin.layout')
@section('title' ,'Add images ')
@section('css')
    {{Html::style('admin-panel/assets/vendors/css/ui/prism.min.css')}}
    {{Html::style('admin-panel/assets/vendors/css/file-uploaders/dropzone.min.css')}}
    {{Html::style('admin-panel/assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}
    {{Html::style('admin-panel/assets/css/plugins/file-uploaders/dropzone.css')}}
@endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upload images for this package</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <p class="card-text">
                            <button id="act-on-upload" class="btn btn-primary mb-1 dz-clickable"><i class="icon-file2"></i> Click start upload files</button>

                           <p> Add images  <code>From your device</code> then press on button to start uploading.</p>
                        {!! Form::open(['route'=>['post.package.images',$package_id],'method'=>'POST','class'=>'dropzone','role'=>'form','id'=>'dpz_file_limits','files'=>true]) !!}
                        {!! Form::close() !!}

                    </div>
                    <input type="hidden" id="go_back" value="{{route('package.images' ,['id' => $package_id])}}" />
                </div>
            </div>
        </div>
    </div>

@endsection












@section('js')


    <!-- BEGIN PAGE VENDOR JS-->
    {{ Html::script('admin-panel/assets/vendors/js/extensions/dropzone.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/ui/prism.min.js')}}
    <!-- END PAGE VENDOR JS-->

    {{ Html::script('admin-panel/assets/js/scripts/extensions/dropzone.js')}}
@endsection