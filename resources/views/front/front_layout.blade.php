@include('front.partials.header')

@yield('css')


<!-- For The Bread Crumb --> 
<div id="header-banner">
	@yield('breadcrumb')
</div>
@include('front.partials.messages')
<!-- END #page-header -->

<!-- For The Content --> 

	<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					
						
						@yield('content')
						
					</div>
					<!-- END #page -->
				</div>
			</div>
			<!-- END .main-contents -->
 

@include('front.partials.footer')

@yield('js')