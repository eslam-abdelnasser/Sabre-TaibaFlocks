@extends('front.front_layout')

@section('title' , 'Login Page')

@section('css')
        <style>
            .has-error{
                color:red;
                border: 2px solid red ; 
            }

            .help-block{
                color:red;
            }
        </style>
@endsection

@section('breadcrumb')
<!-- START #page-header -->
            
              <div class="banner-overlay">
                    <div class="container">
                        <div class="row">
                            <section class="col-sm-6">
                                <h1 class="text-upper">{{trans('login.sign_in')}}</h1>
                            </section>
                            
                            <!-- breadcrumbs -->
                            <section class="col-sm-6">
                                <ol class="breadcrumb">
                                    <li class="home"><a href="#">{{trans('home.home')}}</a></li>
                                    <li class="active">{{trans('login.sign_in')}}</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>
            
@endsection

@section('content')
                <div class="row">
        
            <!-- START #page -->
                    <div id="page" class="col-md-8 full-width">
        <!-- START #contactForm -->
                        <section id="signup-form">
                            <h2 class="ft-heading text-upper">{{trans('login.sign_in')}}</h2>
                            
                            {!! Form::open(['url'=>[LaravelLocalization::getCurrentLocale().'/login'],'method'=>'POST','role'=>'form']) !!}
                            {{-- <form action="contact.php" method="post"> --}}
                                <fieldset>
                                    <ul class="formFields list-unstyled">
                                        
                                        <li class="row">
                                            
                                            <div class="col-md-6">
                                                <label>{{trans('login.email')}}<span class="required small">({{trans('login.required')}})</span></label>
                                                <input type="text" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" />
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{trans('login.password')}} <span class="required small">({{trans('login.required')}})</span></label>
                                                <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" value="" />
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>


                                        </li>
                                        
                                        
                                        

                                       <li class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary btn-lg text-upper sign-up-button" name="submit" value="{{trans('login.sign_in')}}" />
                                                    {{--<span class="required small">*Your email will never published.</span>--}}
                                                </div>
                                            </li>
                                    </ul>
                                </fieldset>
                            {{-- </form> --}}
                            {!! Form::close() !!}
                        </section>
                        <!-- END #contactForm -->
                        </div>
                        <!-- START #sidebar -->
                        <aside id="sidebar" class="col-md-4">
                            <div class="sidebar-widget">
                                <!-- Sidebar Social Icons -->
                                <h2>{{trans('login.create_new_account')}}</h2>
                                <div class="sign-up">
                                    <p><a href="{{ url('register') }}" class="btn btn-primary sign-up-button">{{trans('login.sign_up')}}</a></p>

                                </div>

                            </div>
                        </aside>
                        <!-- END #sidebar -->
                        </div>


@endsection

@section('js')

@endsection