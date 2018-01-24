@extends('admin.layout')
@section('title' ,'Slider')


    @section('css')
        {{Html::style('admin-panel/assets/css/pages/timeline.css')}}
        @endsection

@section('content')
    <div class="content-header row">

        <div class="content-header-left col-md-6 col-xs-12">
            <h3 class="content-header-title mb-0">Home page Slider</h3>
            <p class="text-muted mb-0">There are  4 Sliders.</p>
        </div>

        <div class="content-header-lead col-xs-12 mt-1">
            <p class="lead"></p>
        </div>
    </div>
    <div class="content-body"><section id="timeline" class="timeline-center timeline-wrapper">


            <ul class="timeline">
                <li class="timeline-line"></li>

                @foreach($sliders as $slider)
                <li class="timeline-item {{$loop->index % 2 == 0 ? ' ' : 'mt-3'}}">
                    <div class="timeline-badge">
                        <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="Portfolio project work"></span>
                    </div>
                    <div class="timeline-card card border-grey border-lighten-2">
                        <div class="card-header">
                            <h4 class="card-title"><a href="{{route('slider.edit',['id'=>$slider->id])}}"> Slider number {{$loop->index + 1}}</a></h4>

                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="icon-repeat2"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <img class="img-fluid" src="{{asset('/uploads/slider/'.$slider->image_url)}}" alt="Timeline Image 1">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    @foreach($slider->description as $description)
                                        @if($description->language->label == 'en')
                                            <p class="card-text">{{$description->first_text}}.</p>
                                            <p class="card-text">{{$description->second_text}}.</p>
                                            <p class="card-text">{{$description->third_text}}.</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach




            </ul>

        </section>
    </div>
@endsection


@section('js')


    @endsection