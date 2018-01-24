@extends('front.front_layout')

@section('title' , 'Registration Page')

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
								<h1 class="text-upper">{{trans('login.sign_up')}}</h1>
							</section>
							
							<!-- breadcrumbs -->
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">{{trans('home.home')}}</a></li>
									<li class="active">{{trans('login.sign_up')}}</li>
								</ol>
							</section>
						</div>
					</div>
				</div>
			
@endsection

@section('content')

		<!-- START #page -->
					<div id="page" class="full-width">
		<!-- START #contactForm -->
						<section id="signup-form">
							<h2 class="ft-heading text-upper">{{trans('login.sign_up')}}</h2>
							
                    		{!! Form::open(['url'=>[LaravelLocalization::getCurrentLocale().'/register'],'method'=>'POST','role'=>'form']) !!}
							{{-- <form action="contact.php" method="post"> --}}
								<fieldset>
									<ul class="formFields list-unstyled">
										<li class="row">
											<div class="col-md-6">
												<label>{{trans('booking.first_name')}} <span class="required small">({{trans('login.required')}})</span></label>
												<input type="text" class="form-control {{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{ old('first_name') }}" />
												@if ($errors->has('first_name'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('first_name') }}</strong>
				                                    </span>
			                                    @endif
											</div>
											<div class="col-md-6">
												<label>{{trans('booking.second_name')}}<span class="required small">({{trans('login.required')}})</span></label>
												<input type="text" class="form-control {{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{ old('last_name') }}" />
												@if ($errors->has('last_name'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('last_name') }}</strong>
				                                    </span>
			                                    @endif
											</div>
										</li>
										<li class="row">
											<div class="col-md-6">
												<label>{{trans('login.user_name')}} <span class="required small">({{trans('login.required')}})</span></label>
												<input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ old('name') }}" />
												@if ($errors->has('name'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('name') }}</strong>
				                                    </span>
			                                    @endif
											</div>
											<div class="col-md-6">
												<label>{{trans('booking.email')}}<span class="required small">({{trans('login.required')}})</span></label>
												<input type="text" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" />
												@if ($errors->has('email'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('email') }}</strong>
				                                    </span>
			                                    @endif
											</div>
										</li>
										
										<li class="row">
											<div class="col-md-6">
												<label>{{trans('login.password')}} <span class="required small">({{trans('login.required')}})</span></label>
												<input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" value="" />
												@if ($errors->has('password'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('password') }}</strong>
				                                    </span>
			                                    @endif
											</div>
											<div class="col-md-6">
												<label>{{trans('login.confirm_password')}} <span class="required small">({{trans('login.required')}})</span></label>
												<input type="password" class="form-control  {{ $errors->has('confirm_password') ? ' has-error' : '' }}" name="confirm_password" value="" />
												@if ($errors->has('confirm_password'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('confirm_password') }}</strong>
				                                    </span>
			                                    @endif
											</div>
										</li>
										
										<li class="row">
											<div class="col-md-6">
												<label>{{trans('booking.country')}} <span class="required small">({{trans('login.required')}})</span></label>
												<select class="form-control {{ $errors->has('country') ? ' has-error' : '' }}" name="country" id="country">
													<option value="" selected="" disabled="">{{trans('booking.country')}}v</option>
													@foreach($countries as $country)
														<option {!! old("country") == $country->country_name ? 'selected':'' !!} value="{{ $country->country_name }}">
															{{ $country->country_name }}
														</option>
													@endforeach
												</select>
												@if ($errors->has('country'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('country') }}</strong>
				                                    </span>
			                                    @endif
											</div>
											<div class="col-md-6">
												<label>{{trans('booking.city')}} <span class="required small">({{trans('login.required')}})</span></label>
												<select class="form-control {{ $errors->has('city') ? ' has-error' : '' }}" name="city" id="city">
													<option value="" selected="" disabled="">{{trans('booking.city')}}</option>
												 	@foreach($cities as $city)
														<option {!! old("city") == $city->city_name ? 'selected':'' !!}  value="{{ $city->city_name }}">
															{{ $city->city_name }}
														</option>
													@endforeach
												</select>

												@if ($errors->has('city'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('city') }}</strong>
				                                    </span>
			                                    @endif

											</div>
										</li>
										<li class="row">

											<div class="col-md-6">
												<label>{{trans('booking.mobile_number')}}<span class="required small">({{trans('login.required')}})</span></label>
												<input type="text" class="form-control {{ $errors->has('mobile_number') ? ' has-error' : '' }}" name="mobile_number" value="{{ old('mobile_number') }}" />
												@if ($errors->has('mobile_number'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('mobile_number') }}</strong>
				                                    </span>
			                                    @endif

											</div>
											<div class="col-md-6">
												<label>{{trans('login.street')}}</label>
												<input type="text" class="form-control {{ $errors->has('street') ? ' has-error' : '' }}" name="street" value="{{ old('street') }}" />
												@if ($errors->has('street'))
			                                        <span class="help-block">
				                                        <strong>{{ $errors->first('street') }}</strong>
				                                    </span>
			                                    @endif
											</div>
										</li>
										

										<li class="row">
											<div class="col-md-12">
												<input type="submit" class="btn btn-primary btn-lg  sign-up-button text-upper" name="submit" value="{{trans('login.sign_up')}}" />
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


@endsection

@section('js')
	<script language="javascript">
        populateCountries("country", "city");

	</script>
@endsection