@include('admin.partials.header')

@include('admin.partials.nav')



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            @include('admin.partials.messages')

            @yield('content')



        </div>
    </div>
</div>

@include('admin.partials.footer')
@yield('js')