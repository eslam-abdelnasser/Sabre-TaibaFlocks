@extends('front.front_layout_for_sidebars')

@section('title', 'List All trips')

@section('css')
    {{--<link rel="stylesheet" type="text/css" href="css/starrr.css" media="all" />--}}
    {{ Html::style('front/css/starrr.css') }}
   @endsection
@section('breadcrumb')
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <section class="col-sm-6">
                    <h1 class="text-upper">All Trips</h1>
                </section>

                <!-- breadcrumbs -->
                <section class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="home"><a href="#">Home</a></li>
                        {{--<li><a href="#">Top Deals</a></li>--}}
                        <li class="active">{{$category}}</li>
                    </ol>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($packages as $package)

                <div class="col-md-12 width_arabic">
                    @foreach($package->packageDescription as $description)
                        @if($description->language->label ==  LaravelLocalization::getCurrentLocale())
                    <div class="ft-item col-md-6">
                        <span class="ft-image">
							<img alt="featured Scroller" src="{{asset('uploads/packages/cover/'.$package->image_url)}}" draggable="false">
						</span>
                        <div class="ft-data">

                            <a href="{{route('package',['slug'=>$description->slug])}}" class="ft-hotel text-upper">{{$description->name}}</a>

                            <div class="pull-right">
                                <div class='starrr' id="starrr{{$package->id}}"></div>
                            </div>

                        </div>
                        <div class="ft-foot">

                            <h4 class="ft-title text-upper"><a href="#">{{$description->destination}}</a></h4>

                            <span class="ft-offer text-upper">{{$package->price}} $</span>
                        </div>
                        <div class="ft-foot-ex">
                            <span class="ft-date text-upper alignleft">{{date("F j, Y, g:i a",strtotime($package->journey_start_date))}}</span>

                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>

                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
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
    <!-- START .pagination -->
    <ul class="pagination">
        <li><a href="#">&lsaquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">&rsaquo;</a></li>
    </ul>
    <!-- END .pagination -->

@endsection

@section('js')
    {{--<script type="text/javascript" src="js/starrr.js"></script>--}}
    {{ Html::script('front/js/starrr.js') }}
    <script type="text/javascript">
        @foreach($packages as $package)
        $("#starrr{{$package->id }}" ).starrr({
            @if($package->over_all_rating == null)
            rating: 0,
            @else
            rating: {{$package->over_all_rating}},
            @endif
            readOnly: true
        })
        @endforeach
    </script>
@endsection

