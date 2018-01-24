<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocaleName() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<!-- START head -->
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	<!-- Site meta charset -->
	

	<!-- title -->
	<title>@yield('title')</title>

	<!-- meta description -->
	<meta name="description" content="YOUR META DESCRIPTION GOES HERE" />

	<!-- meta keywords -->
	<meta name="keywords" content="YOUR META KEYWORDS GOES HERE" />

	<!-- meta viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- favicon -->
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

	<!-- bootstrap 3 stylesheets -->
	{{-- <link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" /> --}}
	{{ Html::style('front/bs3/css/bootstrap.css') }}
	<!-- template stylesheet -->
	{{-- <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" /> --}}
	{{ Html::style('front/css/styles.css') }}
	{{ Html::style('front/css/responsive.css') }}
	@if(LaravelLocalization::getCurrentLocale() == 'ar')
		{{ Html::style('front/css/styles_rtl.css') }}
		{{ Html::style('front/css/responsive_rtl.css') }}
		{{ Html::style('front/css/responsive_new_rtl.css') }}
	@endif
	
	

	{{-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" /> --}}
	{{ Html::style('front/css/font-awesome.min.css') }}
	{{-- <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> --}}
	{{ Html::style('front/css/flexslider.css') }}
{{ Html::style('front/datepicker.css') }}
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	{{-- <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="all" /> --}}
	{{ Html::style('front/js/rs-plugin/css/settings.css') }}
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- responsive stylesheet -->
	{{--<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />--}}
	<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
	<!-- Load Fonts via Google Fonts API -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
	<!-- color scheme -->
	{{-- <link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" /> --}}
	{{ Html::style('front/css/colors/color1.css') }}
		{{ Html::style('front/css/responsive_new.css') }}
	<script type="text/javascript" src="//taibaflocks.sa/chat/livechat/php/app.php?widget-init.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102646434-1', 'auto');
  ga('send', 'pageview');

</script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59774734942a0800124c009e&product=sticky-share-buttons' async='async'></script>
</head>
<!-- END head -->

<!-- START body -->
<body>
<!-- START #wrapper -->
<div id="wrapper">
	<!-- START header -->
	<header>
		<!-- START #top-header -->
		<div id="top-header">

		<div class="container">
				<div class="row top-row">
					<div class="col-md-6 email-phone hidden-xs hidden-sm">
						<div class="left-part alignleft">
							<span class="contact-email small"> <i class="fa fa-envelope-o fa-1x" aria-hidden="true"></i> {{$general_settings->site_email}}</span>
							<span class="contact-phone small"><i class="fa fa-phone" aria-hidden="true"></i>{{$general_settings->phone}}</span>
							<ul class="social-media header-social">
								@foreach($social_media as $social)
								<li> <a href="{{$social->url}}"><i class="{{$social->icon}}" aria-hidden="true"></i></a></li>
								@endforeach

							</ul>
						</div>
					</div>
					<div class="col-md-6 login-registration">
						<div class="right-part alignright">

							@if(LaravelLocalization::getCurrentLocale() == 'en')
							<span class="top-link small"><a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"><img src="{{ asset('front/img/flag/ar.png') }}" class="flag-img" /><span class="lang-style">Arabic</span></a></span>
							@else
								<span class="top-link small"><a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"><img src="{{ asset('front/img/flag/en.png') }}" class="flag-img" /><span class="lang-style">English</span></a></span>

							@endif
							<ul class="login-registration">
								
								
							@if(Auth::user())
								<li> <a href="{{route('get_profile')}}">{{trans('home.welcome')}} : {{ Auth::user()->username }}</a></li>
							<li>	{!! Form::open(['route'=>'logout' , 'id'=>'logout_form']) !!}
									<a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">{{trans('home.logout')}}</a>
								{!! Form::close() !!}</li>
								 
							@else
								<li class="login"> <a href="{{route('login')}}"> <i class="fa fa-user" aria-hidden="true"></i> {{trans('label.login')}} / {{trans('label.register')}} </a> </li>
							@endif

							

							</ul>
								@if(Auth::user())
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-bell-o"></span> (<b>{{ count(Auth::user()->notifications) ? count(Auth::user()->notifications) : 0 }}</b>)</a>
									<ul class="dropdown-menu notify-drop">
										<div class="notify-drop-title">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-6">Notifications (<b>{{ count(Auth::user()->notifications) ? count(Auth::user()->notifications) : 0 }}</b>)</div>
												<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
											</div>
										</div>
										<!-- end notify title -->
										<!-- notify content -->
										<div class="drop-content">
											@foreach(Auth::user()->unreadNotifications as $notification)
												@include('front.notifications.'. snake_case(class_basename($notification->type)))
											@endforeach

										</div>
										<div class="notify-drop-footer text-center">
											<a href=""><i class="fa fa-eye"></i> See all</a>
										</div>
									</ul>
								</li>
							</ul>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- START #main-header -->
		<div id="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3 logo">
						<a id="site-logo" href="#">
							<img  class="mr-img" src="{{ asset('front/img/logo.png') }}" alt="Travel Hub" />
						</a>
					</div>
					<div class="col-md-9">
						<nav class="main-nav">
							<span>MENU</span>
							<ul id="main-menu">
								<li><a href="{{route('home')}}" title="">{{trans('home.home')}}</a>

								</li>
								<li><a  href="{{route('about-us')}}" title="">{{trans('home.about_us')}}</a>

								</li>




								<li><a   href="#" title="">{{trans('home.trips')}}</a>
									<ul>
										@foreach($categories as $category)
											@foreach($category->categoryDescription as $description)
												@if($description->language->label ==  LaravelLocalization::getCurrentLocale())
                                        <li><a href="{{route('category-trips',['slug'=>$description->slug])}}" title="">{{$description->name}}</a></li>
												@endif
												@endforeach
										@endforeach

                                    </ul>
								</li>

								<li><a  href="{{ route('blog') }}" title="">{{trans('home.blog')}}</a>

								</li>
								<li><a  href="{{route('traveller-experience') }}" title="">{{trans('home.traveller_experience')}}</a>

								</li>
								<li><a href="{{route('career')}}" title="">{{trans('home.careers')}}</a>

								</li>
								<li><a href="{{route('contact-us')}}" title="">{{trans('home.contact')}}</a>

								</li>
							</ul>

						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- END #main-header -->
	</header>
	<!-- END header -->