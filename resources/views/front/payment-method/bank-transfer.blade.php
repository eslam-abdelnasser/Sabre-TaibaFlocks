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
    <div class="row">
        <div class="col-md-12 bank-transfer">
        <p class="text-center"> hello transfer bank</p>

        </div>
    </div>

@endsection


@section('js')

@endsection