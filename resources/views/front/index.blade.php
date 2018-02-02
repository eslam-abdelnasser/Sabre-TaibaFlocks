@extends('front.index_layout')

@section('title' , 'Home')

@section('css')
    {{ Html::style('front/css/starrr.css') }}
@endsection





@section('content')
    <!-- START #main-slider -->
    <div id="main-slider">
        <div id="content-slider">
            <ul>
                <!-- START Slide 1 -->
                <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                    <img src="{{asset('uploads/slider/'.$slider_one->image_url)}}" alt="Slider Image 1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
                    @foreach($slider_one->description as $description_one)
                        @if($description_one->language->label == LaravelLocalization::getCurrentLocale())
                    <!-- LAYER NR. 1 -->
                    <div class="caption caption-yellow sft stt headline text-upper"
                         data-x="20"
                         data-y="150"
                         data-speed="600"
                         data-start="2000"
                         data-easing="Power3.easeOut"
                         data-endspeed="400"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="off"
                         style="z-index:6;font-size:18px;">{{$description_one->first_text }}
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="caption caption-white sfr stl slider-heading text-upper"
                         data-x="20"
                         data-y="185"
                         data-speed="1000"
                         data-start="1800"
                         data-easing="Power2.easeOut"
                         data-endspeed="600"
                         data-endeasing="Power3.easeIn"
                         data-captionhidden="off"
                         style="z-index:6;font-size:48px; ">{{$description_one->second_text }}
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="caption caption-black sfb stb headline text-upper"
                         data-x="20"
                         data-y="263"
                         data-speed="600"
                         data-start="1500"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index:6">{{$description_one->third_text }}
                    </div>
                    @endif
                    @endforeach
                </li>
                <!-- END Slide 1 -->

                <!-- START Slide 2 -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
                    <img src="{{asset('uploads/slider/'.$slider_two->image_url)}}" alt="Slider Image 2"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
                @foreach($slider_two->description as $description_two)
                    @if($description_two->language->label == LaravelLocalization::getCurrentLocale())
                    <!-- LAYER NR. 1 -->
                    <div class="caption caption-yellow sfl str headline text-upper"
                         data-x="20"
                         data-y="150"
                         data-speed="600"
                         data-start="2000"
                         data-easing="Bounce.easeInOut"
                         data-endspeed="400"
                         data-endeasing="Bounce.easeOut"
                         data-captionhidden="off"
                         style="z-index:6;font-size:18px;">{{$description_two->first_text}}
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="caption caption-white sft stb slider-heading text-upper"
                         data-x="20"
                         data-y="185"
                         data-speed="500"
                         data-start="800"
                         data-easing="Expo.easeIn"
                         data-endspeed="600"
                         data-endeasing="Expo.easeInOut"
                         data-captionhidden="off"
                         style="z-index:6;font-size:48px; ">{{$description_two->second_text}}
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="caption caption-black sfr stl headline text-upper"
                         data-x="20"
                         data-y="263"
                         data-speed="600"
                         data-start="1500"
                         data-easing="Power0.easeOut"
                         data-endspeed="500"
                         data-endeasing="Back.easeOut"
                         data-captionhidden="off"
                         style="z-index:6">{{$description_two->third_text}}
                    </div>
                    @endif
                    @endforeach
                </li>

                <!-- START Slide 3 -->
                <li data-transition="fade" data-slotamount="6" data-masterspeed="800">
                    <img src="{{asset('uploads/slider/'.$slider_three->image_url)}}" alt="Slider Image 3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
                @foreach($slider_three->description as $description_three)
                    @if($description_three->language->label == LaravelLocalization::getCurrentLocale())
                    <!-- LAYER NR. 1 -->
                    <div class="caption caption-yellow sft stt headline text-upper"
                         data-x="20"
                         data-y="150"
                         data-speed="600"
                         data-start="2000"
                         data-easing="Power3.easeOut"
                         data-endspeed="400"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="off"
                         style="z-index:6;font-size:18px;">{{$description_three->first_text}}
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="caption caption-white sfr stl slider-heading text-upper"
                         data-x="20"
                         data-y="185"
                         data-speed="1000"
                         data-start="1800"
                         data-easing="Power2.easeOut"
                         data-endspeed="600"
                         data-endeasing="Power3.easeIn"
                         data-captionhidden="off"
                         style="z-index:6;font-size:48px; ">{{$description_three->second_text}}
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="caption caption-black sfb stb headline text-upper"
                         data-x="20"
                         data-y="263"
                         data-speed="600"
                         data-start="1500"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power1.easeIn"
                         data-captionhidden="off"
                         style="z-index:6">{{$description_three->third_text}}
                    </div>
                    @endif
                    @endforeach
                </li>
                <!-- END Slide 3 -->
            </ul>
        </div>
        <div id="slider-overlay"></div>
    </div>
    <!-- END #main-slider -->


    <!-- START .main-contents -->
    <div class="main-contents">
        <div class="container" id="home-page">

            <!-- START .tour-plan -->


            <div class="tab-manager plan-tour">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">{{trans('label.Book-hotel')}}</a></li>
                    <li><a data-toggle="tab" href="#menu1">{{trans('label.Book-package')}}</a></li>

                </ul>

                <div class="tab-content width_arabic">
                    <div id="home" class="tab-pane fade in active">
                        <form class="">
                            <div class="top-fields">
                                <div class="input-field col-md-3"><input type="text" placeholder="1. Where to go?" /></div>
                                <div class="input-field col-md-3"><input type="text" placeholder="2. What to do?" /></div>
                                <div class="input-field col-md-6 schedule">
                                    <input type="text" class="date-picker" value="" placeholder="3. From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy" />
                                    <i class="calendar-icon"></i>
                                    <input type="text" class="date-picker" value="" placeholder="4. Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" />
                                </div>
                            </div>
                            <div class="bottom-fields">
                                <div class="input-field select col-md-3">
                                    <label>5. With Adults</label>
                                    <select id="adults">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div class="input-field select col-md-3">
                                    <label>6. With Kids</label>
                                    <select id="kids">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div class="input-field col-md-4">
                                    <label>6. Including</label>
                                    <label><input class="input-cb" type="checkbox" name="inc_hotel" value="1" checked="checked" /> Hotel</label>
                                    <label><input class="input-cb" type="checkbox" name="inc_flight" value="1" checked="checked" /> Flight</label>
                                    <label><input class="input-cb" type="checkbox" name="inc_car" value="1" /> Car</label>
                                </div>
                                <div class="submit-btn col-md-2">
                                    <input type="submit" value="Search" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="menu1" class="tab-pane fade width_arabic">
                        {!! Form::open(['route'=>['filter-packages'],'method'=>'GET']) !!}

                        <div class="top-fields">
                                <div class="input-field col-md-3"><input id="destination" type="text" name="destination" placeholder="{{trans('label.where_to_go')}}" /></div>
                                <div class="input-field col-md-3"><input type="text" id="package_name" name="package_name" placeholder="{{trans('label.which_package')}}" /></div>
                                <div class="input-field col-md-6 schedule">
                                    <input type="text" class="date-picker" value="" placeholder="{{trans('label.from_when')}}" name="date_from" data-date="11-12-2012" data-date-format="dd-mm-yyyy" />
                                    <i class="calendar-icon"></i>
                                    <input type="text" class="date-picker" value="" placeholder="{{trans('label.tell_when')}}" name="date_to" data-date="12-12-2012" data-date-format="dd-mm-yyyy" />
                                </div>
                            </div>
                            <div class="bottom-fields">
                                <div class="submit-btn col-md-2">
                                    <input type="submit" value="{{trans('label.search')}}" />
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>

                </div>

            </div>




            <!-- END .tour-plan -->

            <h2 class="ft-heading text-upper">{{trans('label.cheapest-dest')}}</h2>

            <div class="carousel">
                <ul class="slides">
                    @foreach($packages->chunk(8) as $package)
                    <li>
                        <div class="row">
                            @foreach($package->chunk(2) as  $double_package)
                            <div class="col-md-3">
                                @foreach($double_package as $single_package)
                                    @foreach($single_package->packageDescription as $description)
                                        @if($description->language->label ==  LaravelLocalization::getCurrentLocale())
                                <div class="ft-item">
											<span class="ft-image">
												<img src="{{asset('uploads/packages/cheapest/'.$single_package->image_url)}}" alt="featured Scroller" />
											</span>
                                    <div class="ft-data">
                                        <a href="{{route('package',['slug'=>$description->slug])}}" class="ft-hotel text-upper">{{$description->name}}</a>
                                        <div class="pull-right">
                                            <div class='starrr' id="starrr{{$single_package->id}}"></div>
                                        </div>
                                    </div>
                                    <div class="ft-foot">
                                        <h4 class="ft-title text-upper"><a href="#">{{$description->destination}}</a></h4>

                                        <span class="ft-offer text-upper">{{$single_package->price}} $</span>
                                    </div>
                                    <div class="ft-foot-ex">
                                        <span class="ft-date text-upper alignleft">{{date("F j, Y, g:i a",strtotime($single_package->journey_start_date))}}</span>

                                    </div>
                                </div>
                                        @endif
                                @endforeach
                                @endforeach

                            </div>
                            @endforeach
                        </div>
                    </li>
                    @endforeach


                </ul>
            </div>

        </div>
        <div class="container advertise-home">
            <div class="row">
                <div class="col-md-6">
                    @foreach($advertise1->gallery->images as $image)
                    <a href="{{$advertise1->url}}"><img  src="{{asset('uploads/gallery_images/thumbs-500-137/'.$image->image_url)}}" class="img-responsive center-block" alt="tes"/></a>
                    @endforeach
                </div>
                <div class="col-md-6">
                    @foreach($advertise2->gallery->images as $image)
                    <a href="{{$advertise2->url}}"><img  src="{{asset('uploads/gallery_images/thumbs-500-137/'.$image->image_url)}}" class="img-responsive center-block" alt="tes"/></a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- END .main-contents -->

    <!-- START .main-contents .bom-contents -->
    <div class="main-contents bom-contents">
        <div class="container">
            <h2 class="text-center text-upper">{{trans('label.latest')}}</h2>
            {{--<p class="headline text-center">A piece of heaven in the summer of 2013 brought ten small art houses enlivn the street scene in Tracy Arm FJord</p>--}}

            <div class="row">
                @foreach($packages_latest as $package_latest)
                <!-- START featured destination 1 -->
                <section class="col-md-3 fd-column">
                    <div class="featured-dest">
								<span class="fd-image">
									<img class="img-circle" src="{{asset('uploads/packages/latest/'.$package_latest->image_url)}}" alt="Featured Destination" />
								</span>
                        @foreach($package_latest->packageDescription as $package_latest_single)
                            @if($package_latest_single->language->label ==  LaravelLocalization::getCurrentLocale())
                        <h3 class="text-center text-upper latest-header">{{$package_latest_single->name}}</h3>
                        <p class="text-center"> {!! html_entity_decode(strip_tags(str_limit($package_latest_single->description , 50 ))) !!} </p>
                        <span class="btn-center"><a class="btn btn-primary text-upper" href="{{route('package',['slug'=>$package_latest_single->slug])}}" title="Search">{{trans('label.read_more')}}</a></span>
                            @endif
                        @endforeach
                    </div>
                </section>
                <!-- END featured destination 1 -->
                @endforeach

            </div>
        </div>
    </div>
    <!-- END .main-contents .bom-contents -->


@endsection



@section('js')

    {{--<script src="js/jquery.flexslider-min.js"></script>--}}
    {{ Html::script('front/js/jquery.flexslider-min.js') }}
    {{--<script src="js/script.js"></script>--}}
    {{--<script src="js/jquery.minimalect.min.js" type="text/javascript"></script>--}}
    {{ Html::script('front/js/jquery.minimalect.min.js') }}

    {{--<script src="js/styleswitcher.js"></script>--}}
    {{ Html::script('front/js/styleswitcher.js') }}

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    {{--<script type="text/javascript" src="js/rs-plugin/js/jquery.plugins.min.js"></script>--}}
    {{ Html::script('front/js/rs-plugin/js/jquery.plugins.min.js') }}
    {{--<script type="text/javascript" src="js/rs-plugin/js/jquery.revolution.min.js"></script>--}}
    {{ Html::script('front/js/rs-plugin/js/jquery.revolution.min.js') }}

<script type="text/javascript">
    $(document).ready(function() {
        // revolution slider
        revapi = $("#content-slider").revolution({
            delay: 15000,
            startwidth: 1170,
            startheight: 920,
            hideThumbs: 10,
            fullWidth: "on",
            fullScreen: "off",
            fullScreenOffsetContainer: "",
            navigationVOffset: 320
        });

        // initilize datepicker
        $(".date-picker").datepicker({ startDate: "today" });
    });


    $(window).load(function(){
        $('.carousel').flexslider({
            animation: "fade",
            animationLoop: true,
            controlNav: false,
            maxItems: 1,
            pausePlay: false,
            mousewheel:true,
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });


    var destination = {!! $destination !!};

    $( "#destination" ).autocomplete({
        source: destination,
//        select: function (event, ui) {
//            $("#destination").val(ui.item.destination);
//        }
    });

    var packageName = {!! $package_name !!};

    $( "#package_name" ).autocomplete({
        source: packageName,
//        select: function (event, ui) {
//            $("#destination").val(ui.item.destination);
//        }
    });
</script>

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