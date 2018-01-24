@include('front.partials.header')

@yield('css')

@include('front.partials.messages')
<!-- For The Bread Crumb -->
<div id="header-banner">
    @yield('breadcrumb')
</div>
<!-- END #page-header -->

<!-- For The Content -->

<!-- START .main-contents -->
<div class="main-contents">
    <div class="container">
        <!-- START #page -->
    @yield('content')

    </div>
</div>
<!-- END .main-contents -->


@include('front.partials.footer')

@yield('js')
