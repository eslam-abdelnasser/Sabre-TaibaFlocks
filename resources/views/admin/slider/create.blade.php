@extends('admin.layout')
@section('title' ,'Create Slider')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new Slider</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Fill <code>these fields</code> to add new slider . </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($languages as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open(['route'=>['slider.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach($languages as $language)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$language->label}}" aria-expanded="true" aria-labelledby="base-{{$language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Slider first text ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="first_text_{{$language->label}}" class="form-control" placeholder="first text" name="first_text_{{$language->label}}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="timesheetinput1">Slider second text  ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="second_text_{{$language->label}}"  class="form-control" placeholder="second text" name="second_text_{{$language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Slider third text  ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="third_text_{{$language->label}}"  class="form-control" placeholder="third text" name="third_text_{{$language->label}}">

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
    <script type="text/javascript">
        @foreach($languages as $language)
            $("#name_{{$language->label}}").on('change', function (e) {

            $("#slug_{{$language->label}}").val($("#name_{{$language->label}}").val());
        });

        @endforeach
    </script>
@endsection