@extends('admin.layout')
@section('title' ,'Edit Slider')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new Slider</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Fill <code>these fields</code> to Edit slider . </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($slider->description as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->language->label}}" data-toggle="tab" aria-controls="{{$language->language->label}}" href="#{{$language->language->label}}" aria-expanded="true">{{$language->language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open(['route'=>['slider.update',$slider->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach($slider->description as $description)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$description->language->label}}" aria-expanded="true" aria-labelledby="base-{{$description->language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Slider first text ({{$description->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="first_text_{{$description->language->label}}" class="form-control" value="{{$description->first_text}}" placeholder="first text" name="first_text_{{$description->language->label}}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="timesheetinput1">Slider second text  ({{$description->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="second_text_{{$description->language->label}}"  class="form-control" value="{{$description->second_text}}" placeholder="second text" name="second_text_{{$description->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Slider third text  ({{$description->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="third_text_{{$description->language->label}}"  class="form-control" value="{{$description->third_text}}" placeholder="third text" name="third_text_{{$description->language->label}}">

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            @endforeach



                            <div class="form-group">
                                <label>Upload Cover image</label>
                                <label id="projectinput7" class="file center-block">
                                    <input type="file" id="file" name="image_cover">
                                    <span class="file-custom"></span>
                                </label>
                            </div>

                            <div class="form-actions right">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>

                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection