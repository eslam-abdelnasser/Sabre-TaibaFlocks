<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- START head -->
<head>
	<!-- Site meta charset -->
	<meta charset="UTF-8">

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
	{{-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" /> --}}
	{{ Html::style('front/css/font-awesome.min.css') }}
	{{-- <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> --}}
	{{ Html::style('front/css/flexslider.css') }}
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	{{-- <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="all" /> --}}
	{{ Html::style('front/js/rs-plugin/css/settings.css') }}
	<!-- responsive stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
	{{ Html::style('front/css/responsive.css') }}
	<!-- Load Fonts via Google Fonts API -->
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
	<!-- color scheme -->
	{{-- <link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" /> --}}
	{{ Html::style('front/css/colors/color1.css') }}

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
					<div class="col-md-6 email-phone">
						<div class="left-part alignleft">
							<span class="contact-email small"> <i class="fa fa-envelope-o fa-1x" aria-hidden="true"></i> touchus@travelhub.com</span>
							<span class="contact-phone small"><i class="fa fa-phone" aria-hidden="true"></i> +1 125 496 0999</span>
							<ul class="social-media header-social">
								<li> <a href="#"><i class="fa fa-yahoo" aria-hidden="true"></i></a></li>
								<li><a  href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a  href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
								<li><a  href="#"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
								<li><a  href="#"><i class="fa fa-windows" aria-hidden="true"></i></a></li>
								<li><a  href="#"><i class="fa fa-stumbleupon-circle" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right-part alignright">
							<form action="#" method="get">
								<fieldset class="alignright">
									<input type="text" name="s" class="search-input" value="Search..." onfocus="if (this.value == 'Search...') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Search...'; }" />
									<input type="submit" name="submit" class="search-submit" value="" />
								</fieldset>
							</form>
							<span class="top-link small"><a href="#"><img src="{{ asset('front/img/flag/ar.png') }}" class="flag-img" /><span class="lang-style">Arabic</span></a></span>
							<ul class="login-registration">
								
								
							@if(Auth::user())
								Welcome : {{ Auth::user()->username }}	<br>
								{!! Form::open(['url'=>'logout' , 'id'=>'logout_form']) !!}
									<a href="javascript:{}" onclick="document.getElementById('logout_form').submit();">logout</a>
								{!! Form::close() !!}
								 
							@else
								<li class="login"> <a href="sign-in.html"> <i class="fa fa-user" aria-hidden="true"></i> Login / register </a> </li>
							@endif

							

							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification (<b>2</b>)</a>
									<ul class="dropdown-menu notify-drop">
										<div class="notify-drop-title">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-6">Bildirimler (<b>2</b>)</div>
												<div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
											</div>
										</div>
										<!-- end notify title -->
										<!-- notify content -->
										<div class="drop-content">
											<li>
												<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
												<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>

													<hr>
													<p class="time">Şimdi</p>
												</div>
											</li>
											<li>
												<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
												<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
													<p>Lorem ipsum sit dolor amet consilium.</p>
													<p class="time">1 Saat önce</p>
												</div>
											</li>
											<li>
												<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
												<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
													<p>Lorem ipsum sit dolor amet consilium.</p>
													<p class="time">29 Dakika önce</p>
												</div>
											</li>
											<li>
												<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
												<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
													<p>Lorem ipsum sit dolor amet consilium.</p>
													<p class="time">Dün 13:18</p>
												</div>
											</li>
											<li>
												<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>
												<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
													<p>Lorem ipsum sit dolor amet consilium.</p>
													<p class="time">2 Hafta önce</p>
												</div>
											</li>
										</div>
										<div class="notify-drop-footer text-center">
											<a href=""><i class="fa fa-eye"></i> Tümünü Göster</a>
										</div>
									</ul>
								</li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- START #main-header -->
		<div id="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<a id="site-logo" href="#">
							<img  class="mr-img" src="{{ asset('front/img/logo.png') }}" alt="Travel Hub" />
						</a>
					</div>
					<div class="col-md-9">
						<nav class="main-nav">
							<span>MENU</span>
							<ul id="main-menu">
								<li><a href="index.html" title="">HOME</a>
									<!-- <ul>
                                        <li><a href="index.html" title="">HOME PAGE 1</a></li>
                                        <li><a href="home.html" title="">HOME PAGE 2</a></li>
                                    </ul> -->
								</li>
								<li><a  href='about-us.html' title="">About us</a>
									<!-- <ul>
                                        <li><a href="gallery.html" title="">GALLERY COLUMNS</a></li>
                                        <li><a href="gallery-slideshow.html" title="">GALLERY SLIDESHOW</a></li>
                                    </ul> -->
								</li>



								<!-- <li><a title="">PAGES</a>
                                    <ul>
                                        <li><a href="widget.html" title="">WIDGETS</a></li>
                                        <li><a href="shortcodes.html" title="">SHORTCODES</a></li>
                                        <li><a href="404page.html" title="">404 ERROR PAGE</a></li>
                                        <li><a href="booking-form.html" title="">BOOKING FORM</a></li>
                                        <li><a href="order-confirmation.html" title="">ORDER CONFIRMATION</a></li>
                                        <li><a href="price-table.html" title="">PRICE TABLES</a></li>
                                        <li><a href="sign-in.html" title="">SIGN IN</a></li>
                                        <li><a href="sign-up.html" title="">SIGN UP</a></li>
                                        <li><a href="tour-plan.html" title="">TOUR PLAN</a></li>
                                        <li><a href="user-profile.html" title="">USER PROFILE</a></li>
                                    </ul>
                                </li>	 -->
								<li><a   href="deals-sidebar.html" title="">Trips</a>
									<ul>
										@foreach($categories as $category)
											@foreach($category->categoryDescription as $description)
												@if($description->language->label ==  LaravelLocalization::getCurrentLocale())
                                        <li><a href="{{route('category-trips',['slug'=>$description->slug])}}" title="">{{$description->name}}</a></li>
												@endif
												@endforeach
										@endforeach
                                        {{--<li><a href="deals-sidebar.html" title="">DEALS PAGE WITH SIDEBAR</a></li>--}}
                                        {{--<li><a href="deals-detail.html" title="">DEALS DETAIL</a></li>--}}
                                        {{--<li><a href="deals-detail-sidebar.html" title="">DEALS DETAIL SIDEBAR</a></li>--}}
                                        {{--<li><a href="deals-listview.html" title="">LIST VIEW</a></li>--}}
                                        {{--<li><a href="deals-listview-sidebar.html" title="">LIST VIEW SIDEBAR</a></li>--}}
                                    </ul>
								</li>

								<li><a  href="blog-sidebar.html" title="">BLOG</a>
									<!-- <ul>
                                        <li><a href="blog.html" title="">BLOG PAGE</a></li>
                                        <li><a href="blog-sidebar.html" title="">BLOG PAGE WITH SIDEBAR</a></li>
                                        <li><a href="blog-detail.html" title="">BLOG DETAIL</a></li>
                                        <li><a href="blog-detail-sidebar.html" title="">BLOG DETAIL SIDEBAR</a></li>
                                        <li><a href="blog-listview.html" title="">LIST VIEW</a></li>
                                        <li><a href="blog-listview-sidebar.html" title="">LIST VIEW SIDEBAR</a></li>
                                        <li><a href="single.html" title="">SINGLE POST</a></li>
                                    </ul> -->
								</li>
								<li><a  href="blog-sidebar.html" title="">Travellers trips</a>
									<!-- <ul>
                                        <li><a href="blog.html" title="">BLOG PAGE</a></li>
                                        <li><a href="blog-sidebar.html" title="">BLOG PAGE WITH SIDEBAR</a></li>
                                        <li><a href="blog-detail.html" title="">BLOG DETAIL</a></li>
                                        <li><a href="blog-detail-sidebar.html" title="">BLOG DETAIL SIDEBAR</a></li>
                                        <li><a href="blog-listview.html" title="">LIST VIEW</a></li>
                                        <li><a href="blog-listview-sidebar.html" title="">LIST VIEW SIDEBAR</a></li>
                                        <li><a href="single.html" title="">SINGLE POST</a></li>
                                    </ul> -->
								</li>
								<li><a href="blog-sidebar.html" title="">Careers</a>
									<!-- 	<ul>
                                            <li><a href="top-activities.html" title="">TOP ACTIVITIES</a></li>
                                            <li><a href="top-activities-sidebar.html" title="">TOP ACTIVITIES WITH SIDEBAR</a></li>
                                            <li><a href="top-activities-listview.html" title="">LIST VIEW</a></li>
                                            <li><a href="top-activities-listview-sidebar.html" title="">LIST VIEW SIDEBAR</a></li>
                                        </ul> -->
								</li>
								<li><a href="contact.html" title="">CONTACT</a>
									<!-- <ul>
                                        <li><a href="contact.html" title="">CONTACT PAGE 1</a></li>
                                        <li><a href="contact-us.html" title="">CONTACT PAGE 2</a></li>
                                    </ul> -->
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