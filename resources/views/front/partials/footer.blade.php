<!-- START footer -->
	<footer>
		<!-- START #ft-footer -->
		<div id="ft-footer">
			<div class="footer-overlay">
				<div class="container">
					<div class="row">
						<!-- testimonials -->
						<section class="col-md-4 col-xs-12">
							<h3>{{trans('home.about_us')}}</h3>
							<p>  @foreach($about_us->description as $about)
									@if($about->language->label ==  LaravelLocalization::getCurrentLocale())
										{!! html_entity_decode(str_limit(strip_tags($about->description, 100))) !!}
									@endif
								@endforeach
							</p>

						</section>

						<!-- twitter -->
						<section class="col-md-4 col-xs-12">
							<h3>{{trans('home.contact')}}</h3>
							<p><span class="fa fa-home"></span>
								@if(LaravelLocalization::getCurrentLocale() =='en')
									{{$general_settings->address_english}}
								@else
									{{$general_settings->address_arabic}}
								@endif
							</p>
							<p><span class="fa fa-phone-square"></span>{{$general_settings->phone}}</p>
							<p><span class="fa fa-envelope"></span> {{$general_settings->site_email}}</p>
						</section>
						<section class="col-md-4">
							<h3> {{trans('label.general_information')}}</h3>
							<ul class="general-information">
								<li><a href="#">{{trans('home.home')}}</a></li>
								<li><a href="#">{{trans('home.about_us')}}</a></li>
								<li><a href="#">{{trans('label.policy_privacy')}}</a></li>
								<li><a href="#">{{trans('label.terms_conditions')}}</a></li>
							</ul>
						</section>
					</div>
				</div>
			</div>
		</div>
		<!-- END #ft-footer -->

		<!-- START #ex-footer -->
		<div id="#ex-footer">
			<div class="container">
				<div class="row">
					<nav class="col-md-12">
						<ul class="footer-menu">
							<li><a href="#">{{trans('home.home')}}</a></li>
							<li><a href="#">{{trans('home.about_us')}}</a></li>
							<li><a href="#">{{trans('home.trips')}}</a></li>
							<li><a href="#">{{trans('home.blog')}}</a></li>
							<li><a href="#">{{trans('home.careers')}}</a></li>

							<li class="last-item"><a href="#">{{trans('home.contact')}}</a></li>
						</ul>
					</nav>

					<div class="foot-boxs">
						<div class="foot-box col-md-4 text-right">
							<span>{{trans('label.footer_follow')}}</span>
							<ul class="social-media footer-social">
								@foreach($social_media as $social)
									<li> <a href="{{$social->url}}"><i class="{{$social->icon}}" aria-hidden="true"></i></a></li>
								@endforeach
							</ul>
						</div>
						<div class="foot-box foot-box-md col-md-4">
							<span class="contact-email"> {{$general_settings->site_email}}</span>
							<span class="contact-phone"> {{$general_settings->phone}}</span>
						</div>
						<div class="foot-box col-md-4">
							<span class="">&copy; 2017 Tiba flocks. All Rights Reserved.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #ex-footer -->
	</footer>
	<!-- END footer -->
</div>
<!-- END #wrapper -->

				
				<!-- javascripts -->
		{{-- <script type="text/javascript" src="js/modernizr.custom.17475.js"></script> --}}
		{{ Html::script('front/js/modernizr.custom.17475.js') }}

		{{-- <script type="text/javascript" src="js/jquery.min.js"></script> --}}
		{{--{{ Html::script('front/js/jquery.min.js') }}--}}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		{{-- <script type="text/javascript" src="bs3/js/bootstrap.min.js"></script> --}}
		{{ Html::script('front/bs3/js/bootstrap.min.js') }}
		{{-- <script type="text/javascript" src="js/script.js"></script> --}}
		{{ Html::script('front/js/script.js') }}
		{{ Html::script('front/js/countries.js') }}
		{{--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>--}}
{{--		{{ Html::script('front/js/bootstrap-datepicker.js') }}--}}
{{ Html::script('front/datepicker.js') }}
		<!--[if lt IE 9]>
			{{--<!--<script type="text/javascript" src="js/html5shiv.js"></script>-->--}}
			{{ Html::script('front/js/html5shiv.js') }}
		<![endif]-->

<script type="text/javascript" >



    var destination = {!! $package_destination !!};

    $( "#destination" ).autocomplete({
        source: destination,
//        select: function (event, ui) {
//            $("#destination").val(ui.item.destination);
//        }
    });

    var packageName = {!! $package_destination !!};

    $( "#package_name" ).autocomplete({
        source: packageName,
//        select: function (event, ui) {
//            $("#destination").val(ui.item.destination);
//        }
    });

    $(".date-picker").datepicker({ startDate: "today" });
</script>
	</body>
</html>