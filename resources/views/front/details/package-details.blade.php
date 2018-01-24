@extends('front.front_layout_for_sidebars')

@section('title', 'List All trips')

@section('css')
    {{--<link rel="stylesheet" type="text/css" href="css/starrr.css" media="all" />--}}
    {{ Html::style('front/css/starrr.css') }}
    {{--<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="all"/>--}}
    {{ Html::style('front/css/owl.carousel.css') }}
    {{--<link rel="stylesheet"  href="css/owl.carousel.css"/>--}}
    {{--<link rel="stylesheet"  href="css/lightslider.css"/>--}}
    {{ Html::style('front/css/lightslider.css') }}
    <style>
        #image-gallery{
            list-style: none outside none;
            padding-left: 0;
            margin: 0;
        }
        .demo .item{
            margin-bottom: 60px;
        }
        .content-slider li{
            background-color: #ed3020;
            text-align: center;
            color: #FFF;
        }
        .content-slider h3 {
            margin: 0;
            padding: 70px 0;
        }
        .demo{
            width: 800px;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <section class="col-sm-6">
                    @foreach($package->packageDescription as $description)

                        @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                    <h1 class="text-upper">{{$description->name}}</h1>
                        @endif
                    @endforeach
                </section>

                <!-- breadcrumbs -->
                <section class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="home"><a href="#">{{trans('home.home')}}</a></li>
                        {{--<li><a href="#">Top Deals</a></li>--}}
                        @foreach($package->packageDescription as $description)

                            @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                        <li class="active">{{$description->name}}</li>
                            @endif
                        @endforeach
                    </ol>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <!-- START #page -->
        <div id="page" class="col-md-8">
            <!-- START .tour-plans -->
            <div class="tour-plans">
                <div class="plan-image">
                    <div class="demo">
                        <div class="item">
                            <div class="clearfix" style="max-width:770px; ">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach($package->gallery as $gallery)
                                    <li data-thumb="{{asset('uploads/packages/images/thumb/'.$gallery->image_url )}}">
                                        <img src="{{asset('uploads/packages/images/resized/'.$gallery->image_url )}}" />
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>


                    </div>
                    <!--<img class="img-responsive" src="http://placehold.it/770x321" alt="Vancouver, BC" />-->
                    <div class="offer-box">
                        <div class="offer-top">
                            {{--<span class="ft-temp alignright">19&#730;c</span>--}}
                            {{--<span class="featured-cr text-upper">Spain</span>--}}
                            @foreach($package->packageDescription as $description)

                                @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                            <h2 class="featured-cy text-upper">{{$description->destination}}</h2>
                            @endif
                            @endforeach
                        </div>

                        <div class="offer-bottom">

                            <span class="featured-stf">Starting From </span>
                            <span class="featured-spe">{{$package->price}} $</span>
                        </div>
                    </div>
                </div>

                <div class="featured-btm box-shadow1">
                    <span> Journey  date: {{date("F j, Y, g:i a",strtotime($package->journey_start_date))}}</span>
                    <span> reservation date: {{date("F j, Y, g:i a",strtotime($package->reservation_start_date))}}</span>

                    <div class="pull-right">
                        <div class='starrr' id="starrr{{$package->id}}"></div>
                    </div>
                </div>
                <div class="head-title">
                    <div class="row col-md-12 pull-left">
                        @foreach($package->packageDescription as $description)

                            @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                        <h2 class="text-upper">{{$description->name}}</h2>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-12 book-now">
                        @foreach($package->packageDescription as $description)

                            @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                                @if(Auth::check())
                                    <button class="btn btn-primary" onclick="javascript:location.href='{{route('book-now.user',['slug'=>$description->slug])}}'"> {{trans('label.book_now')}}</button>
                                @else
                                    <button class="btn btn-primary" onclick="javascript:location.href='{{route('book-now.guest',['slug'=>$description->slug])}}'"> {{trans('label.book_now')}}</button>
                                @endif
                            @endif
                        @endforeach

                    </div>

                </div>
                @foreach($package->packageDescription as $description)

                    @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                <p>{!! html_entity_decode($description->description)!!}</p>
                    @endif
                @endforeach
            </div>
            <!-- END .tour-plans -->

            <!-- START TABS -->
            <ul class="nav nav-tabs text-upper reviews-tabs">
                <li class="active"><a href="#tourPlan" data-toggle="tab">{{trans('label.review')}}</a></li>
                <li><a href="#flightSchedule" data-toggle="tab">{{trans('label.previous_review')}}</a></li>
                <li><a href="#popular-posts" data-toggle="tab">{{trans('label.features')}}</a></li>

            </ul>
            <!-- END TABS -->

            <!-- START TAB CONTENT -->
            <div class="tab-content gray box-shadow1 clearfix marb30">
                <!-- START TAB 1 -->
                <div class="tab-pane active" id="tourPlan">
                    <div class="rating-box">
                        <h5>{{trans('label.rate_now')}}:</h5>
                        <div class='starrr' id='star1'></div>

                    </div>
                    <div class="review-box">
                        {!! Form::open(['route'=>['review.post'],'method'=>'POST','role'=>'form']) !!}
                            <input type="hidden" id="rating"  name="rating"/>
                            @if(!Auth::check())
                            <div class="col-md-8">


                                <label>{{trans('label.email')}}</label>
                                <input type="text" class="form-control input-background" name="email" value="" />
                            </div>
                            @endif
                            <input type="hidden" value="{{encrypt($package->id)}}" name="package"/>
                            <div class="col-md-8">
                                <label>{{trans('label.your_review')}}</label>
                                <textarea  class="form-control input-background" name="message"></textarea>
                            </div>
                            <div class="col-md-10 submit-review">
                                <input type="submit" class="btn btn-primary btn-lg  sign-up-button text-upper" name="submit" value="{{trans('label.submit')}}" />
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- END TAB 1 -->

                <!-- START TAB 2 -->
                <div class="tab-pane" id="flightSchedule">
                    <ul class="rc-posts-list list-unstyled">
                        @if(count($reviews))
                        @foreach($reviews as $review)
                        <li>
                            <h4>{{$review->email}}</h4>
                            <h5>{{$review->message}}</h5>
                            <span class="rc-post-date small">{{date('Y-m-d H:i:s', strtotime($review->created_at))}}</span>
                        </li>
                       @endforeach
                        @endif
                    </ul>
                </div>
                <!-- END TAB 2 -->

                <!-- START TAB 1 -->
                <div class="tab-pane" id="popular-posts">
                    <ol class="rc-posts-list " type="1">
                        @foreach($package->features as $feature )
                            @foreach($feature->featureDescription as $description)
                                @if($description->language->label == LaravelLocalization::getCurrentLocale())
                        <li>
                            <h5><a href="#">{{$description->name}}.</a></h5>
                            <p>{{$description->description}}</p>
                        </li>
                                @endif
                                @endforeach
                       @endforeach
                    </ol>

                </div>
                <!-- END TAB 1 -->
            </div>
            <!-- END TAB CONTENT -->
        </div>
        <!-- END #page -->
        <!-- START #sidebar -->

        <aside id="sidebar" class="col-md-4">

            <div class="sidebar-widget">

                <!-- Sidebar recent popular posts -->

                <!-- START TABS -->

                <ul class="nav nav-tabs text-upper">



                    <li class="active"><a href="#recent-posts" data-toggle="tab">{{trans('label.question')}}</a></li>



                </ul>

                <!-- END TABS -->



                <!-- START TAB CONTENT -->

                <div class="tab-content gray box-shadow1 clearfix marb30">





                    <!-- START TAB 2 -->

                    <div class="tab-pane active" id="recent-posts">

                        {!! Form::open(['route'=>['question.post'],'method'=>'POST']) !!}

                        <div class="top-fields" >

                            <div class="input-field col-md-12"><input type="text"  name="email" placeholder="{{trans('label.email')}}" /></div>

                            <div class="input-field col-md-12"><input type="text" name="phone" placeholder="{{trans('label.phone')}}" /></div>

                            <div class="input-field col-md-12">

                                <textarea class="form-control" name="message" style="background-color: white" placeholder="{{trans('label.your_question')}}" ></textarea>

                            </div>

                            <div class="submit-btn col-md-6">

                                <input type="submit" value="{{trans('label.submit')}}" />

                            </div>

                        </div>



                        <{!! Form::close() !!}

                    </div>

                    <!-- END TAB 2 -->

                </div>

                <!-- END TAB CONTENT -->

            </div>





            <div class="sidebar-widget">

                <!-- Sidebar About -->

                <div class="tab-manager plan-tour rm-margin">



                    <ul class="nav nav-tabs">

                        <li class="active"><a data-toggle="tab" href="#home">{{trans('label.Book-hotel')}}</a></li>

                        <li><a data-toggle="tab" href="#menu1">{{trans('label.Book-package')}}</a></li>



                    </ul>



                    <div class="tab-content">

                        <div id="home" class="tab-pane fade in active">

                            <form class="">

                                <div class="top-fields">

                                    <div class="input-field col-md-6"><input type="text" placeholder="1. Where to go?" /></div>

                                    <div class="input-field col-md-6"><input type="text" placeholder="2. What to do?" /></div>

                                    <div class="input-field col-md-12 schedule">

                                        <input type="text" class="date-picker" value="" placeholder="3. From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy" />

                                        <i class="calendar-icon"></i>

                                        <input type="text" class="date-picker" value="" placeholder="4. Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" />

                                    </div>

                                </div>

                                <div class="bottom-fields">



                                    <div class="submit-btn col-md-6">

                                        <input type="submit" value="{{trans('label.search')}}" />

                                    </div>

                                </div>

                            </form>

                        </div>

                        <div id="menu1" class="tab-pane fade">

                            {!! Form::open(['route'=>['filter-packages'],'method'=>'GET']) !!}

                            <div class="top-fields">

                                <div class="input-field col-md-6"><input id="destination" type="text" name="destination" placeholder="{{trans('label.where_to_go')}}" /></div>

                                <div class="input-field col-md-6"><input type="text" id="package_name" name="package_name" placeholder="{{trans('label.which_package')}}" /></div>

                                <div class="input-field col-md-12 schedule">

                                    <input type="text" class="date-picker" value="" placeholder="{{trans('label.from_when')}}" name="date_from" data-date="11-12-2012" data-date-format="dd-mm-yyyy" />

                                    <i class="calendar-icon"></i>

                                    <input type="text" class="date-picker" value="" placeholder="{{trans('label.tell_when')}}" name="date_to" data-date="12-12-2012" data-date-format="dd-mm-yyyy" />

                                </div>

                            </div>

                            <div class="bottom-fields">



                                <div class="submit-btn col-md-6">

                                    <input type="submit" value="{{trans('label.search')}}" />

                                </div>

                            </div>

                            {!! Form::close() !!}

                        </div>



                    </div>



                </div>

            </div>

            <div class="sidebar-widget">

                @foreach($advertise3->gallery->images as $image)

                    <a href="{{$advertise3->url}}"> <img src="{{asset('uploads/gallery_images/thumbs-400-200/'.$image->image_url)}}" class="img-responsive" alt="advertise"/></a>

                @endforeach

            </div>

            <div class="sidebar-widget">

                <!-- Sidebar Newsletter -->

                <div class="styled-box gray">

                    <h3 class="text-upper">{{trans('label.newsletter')}}</h3>

                    <form action="#" method="post">

                        <label>{{trans('label.email')}}</label>

                        <input type="text" name="email" class="form-control input-style1 marb20" value="{{trans('label.email')}}" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />

                        <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="{{trans('label.subscribe')}}" />

                    </form>

                </div>

            </div>







        </aside>

        <!-- END #sidebar -->
    </div>
    <!-- END .row -->
    <div class="row">
        <div class="col-md-12">
            @if(count($related_packages) == 1 )
                @if($related_packages->id != $package->id)
            <h2>Related trips</h2>
                @endif
                @endif
        </div>
        <div class="col-md-12">
            <div class="owl-carousel" id="carousel">
                @foreach($related_packages as $related_package)
                    @foreach($related_package->packageDescription as $related_description)
                    @if($related_package->id != $package->id)
                        <div class="item">
                            <div class="ft-item">
											<span class="ft-image">
												<img src="{{asset('uploads/packages/cover/'.$related_package->image_url)}}" alt="featured Scroller" />
											</span>
                                <div class="ft-data">

                                    <a href="{{route('package',['slug'=>$related_description->slug])}}" class="ft-hotel text-upper">{{$related_description->name}}</a>

                                    <div class="pull-right">
                                        <div class='starrr' id="starrr{{$related_package->id}}"></div>
                                    </div>

                                </div>
                                <div class="ft-foot">

                                    <h4 class="ft-title text-upper"><a href="#">{{$related_description->destination}}</a></h4>

                                    <span class="ft-offer text-upper">{{$related_package->price}} $</span>
                                </div>
                                <div class="ft-foot-ex">
                                    <span class="ft-date text-upper alignleft">{{date("F j, Y, g:i a",strtotime($related_package->journey_start_date))}}</span>

                                </div>
                            </div>
                        </div>


                     @endif
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>

@endsection

@section('js')
    {{--<script type="text/javascript" src="js/starrr.js"></script>--}}
    {{ Html::script('front/js/starrr.js') }}
    {{--<script src="js/lightslider.js"></script>--}}
    {{ Html::script('front/js/lightslider.js') }}
    {{--<script type="text/javascript" src="js/owl.carousel.js"></script>--}}
    {{ Html::script('front/js/owl.carousel.js') }}
    {{--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>--}}
    {{ Html::script('front/js/bootstrap-datepicker.js') }}
    <script type="text/javascript">

        $("#starrr{{$package->id }}").starrr({
            @if($package->over_all_rating == null)
            rating: 0,
            @else
            rating: {{$package->over_all_rating}},
            @endif
            readOnly: true
        });
         $('#star1').starrr({
            change: function(e, value){
                if (value) {
                    $('.your-choice-was').show();

                    $('#rating').val(value);
                }


            }
        });
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
            $(".date-picker").datepicker();
        });
        var product = $('#carousel');
        product.owlCarousel({
            margin: 15,
            loop: true,
            dots: true,
//            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
@endsection

