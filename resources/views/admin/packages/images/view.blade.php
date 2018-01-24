@extends('admin.layout')
@section('title' ,'Add images ')
@section('css')

    {{Html::style('admin-panel/assets/vendors/js/gallery/photo-swipe/photoswipe.css')}}
    {{Html::style('admin-panel/assets/vendors/js/gallery/photo-swipe/default-skin/default-skin.css')}}
    {{Html::style('admin-panel/assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}
    {{Html::style('admin-panel/assets/css/pages/gallery.css')}}
@endsection
@section('content')



    <section id="hover-effects" class="card">
        <div class="card-header">
            <h4 class="card-title">View All images</h4>
            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in">
            <div class="card-block pb-0">
                <div class="card-text">
                    <p>Show images in addition to you can delete image</p>
                </div>
            </div>
            <div class="card-block my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                <div class="row">
                    <div class="grid-hover">
                        <h5 class="col-xs-12">Package images</h5>

                        @foreach($package_images as $image )
                        <div class="col-md-3 col-xs-12">
                            <figure class="effect-lily">
                                <img src="{{asset('uploads/packages/images/'.$image->image_url)}}" alt="img12" />
                                <figcaption>
                                    <div>

                                        {!! Form::open(['route'=>['delete.package.images',$image->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}
                                        <button type="submit" class="btn btn-danger btn-min-width btn-round mr-1 mb-1"><i class="icon-eye"></i> Delete</button>
                                        {!! Form::close() !!}
                                    </div>

                                </figcaption>
                            </figure>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!--/ Image grid -->
    </section>













@endsection












@section('js')

    <!-- BEGIN PAGE VENDOR JS-->
    {{ Html::script('admin-panel/assets/vendors/js/gallery/masonry/masonry.pkgd.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/gallery/photo-swipe/photoswipe.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/gallery/photo-swipe/photoswipe-ui-default.min.js')}}
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
{{--    {{ Html::script('admin-panel/assets/js/scripts/gallery/photo-swipe/photoswipe-script.js')}}--}}
    <!-- END PAGE LEVEL JS-->


@endsection