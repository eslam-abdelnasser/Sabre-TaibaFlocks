@extends('front.front_layout_for_sidebars')

@section('title', 'Contact us')

@section('css')

@endsection
@section('breadcrumb')
    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <section class="col-sm-6">

                    <h1 class="text-upper">{{trans('home.contact')}}</h1>

                </section>

                <!-- breadcrumbs -->
                <section class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="home"><a href="#">{{trans('home.home')}}</a></li>
                        {{--<li><a href="#">Top Deals</a></li>--}}
                        <li class="active">{{trans('home.contact')}}</li>
                    </ol>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="row">
        <!-- START #page -->
        <div id="page" class="col-md-8 col-xs-12 full-width">
            <!-- GOOGLE MAP -->
            <section id="contactMap">
                <iframe src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=uk&amp;aq=&amp;sll=18.312811,-4.306641&amp;sspn=46.292419,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=United+Kingdom&amp;ll=52.352119,-2.647705&amp;spn=0.685471,1.352692&amp;t=p&amp;z=10&amp;output=embed"></iframe>
            </section>

            <!-- START #contactForm -->
            <section id="contactForm">
                <h2 class="ft-heading text-upper">{{trans('label.contact_text')}}</h2>
                <form action="#" method="post">
                    <fieldset>
                        <ul class="formFields list-unstyled">
                            <li class="row">
                                <div class="col-md-6">
                                    <label>{{trans('label.name')}} <span class="required small">({{trans('label.required')}})</span></label>
                                    <input type="text" class="form-control" name="name" value="" />
                                </div>
                                <div class="col-md-6">
                                    <label>{{trans('label.email')}} <span class="required small">({{trans('label.required')}})</span></label>
                                    <input type="text" class="form-control" name="email" value="" />
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-12">
                                    <label>{{trans('label.subject')}} <span class="required small">({{trans('label.required')}})</span></label>
                                    <input type="text" class="form-control" name="subject" value="" />
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-12">
                                    <label>{{trans('label.message')}} <span class="required small">({{trans('label.required')}})</span></label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary btn-lg text-upper" name="submit" value="{{trans('label.submit')}}" />
                                    {{--<span class="required small">*Your email will never published.</span>--}}
                                </div>
                            </li>
                        </ul>
                    </fieldset>
                </form>
            </section>
            <!-- END #contactForm -->
        </div>
        <!-- END #page -->

        <!-- START #sidebar -->
        <aside id="sidebar" class="col-md-4 col-xs-12">


            <div class="sidebar-widget">
                <!-- Sidebar Contact info -->
                <div class="styled-box gray">
                    <h3 class="text-upper">{{trans('home.contact')}}</h3>
                    {{--<p>We're very approachable and would love to speak to you. Feel free to call, send us an email, Tweet us or simply complete the enquiry form.</p>--}}
                    <ul class="contact-info list-unstyled">
                        <li class="ct-phone">{{$general_settings->phone}}</li>
                        <li class="ct-email">{{$general_settings->site_email}}</li>
                        <li class="ct-facebook">www.facebook.com/Taiba Flocks</li>
                        <li class="ct-twitter">#Taiba Flocks</li>
                    </ul>
                </div>
            </div>


        </aside>
        <!-- END #sidebar -->
    </div>
    <!-- END .row -->


@endsection

@section('js')


@endsection

