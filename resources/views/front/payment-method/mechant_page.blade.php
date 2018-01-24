@extends('front.front_layout')

@section('title' , 'BOOK NOW')

@section('css')

@endsection

@section('breadcrumb')
    <!-- START #page-header -->

    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <section class="col-sm-6">
                    <h1 class="text-upper">Book now</h1>
                </section>

                <!-- breadcrumbs -->
                <section class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="home"><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Book now</li>
                    </ol>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('content')


    <form action="{{$merchant_page['url']}}" method="POST" id="merchant_page">
        @foreach($merchant_page['params'] as $k => $value )
        <input type="hidden" value="{{ $value  }}" name="{{ $k }}" />
        @endforeach
        {{--<input type="submit"  value="submit"/>--}}
    </form>

@endsection


@section('js')
<script type="text/javascript">

       $('#merchant_page').submit();


</script>
@endsection