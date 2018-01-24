@extends('admin.layout')
@section('title' ,'About us')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About us page</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Fill <code>these fields</code> About us </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($languages as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::model($about , ['route'=>['admin.about.update'  , $about->id ],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach ($about->description as $value)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$value->language->label}}" aria-expanded="true" aria-labelledby="base-{{$value->language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Title ({{$value->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="name_{{$value->language->label}}" value="{{$value->title}}" class="form-control" placeholder="Title" name="title_{{$value->language->label}}">

                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="timesheetinput7">Description ({{$value->language->name }})</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea id="timesheetinput7" rows="5" class="form-control my-editor"  name="description_{{$value->language->label}}" placeholder="Description">{{$value->description}}</textarea>
                                                <div class="form-control-position">
                                                    <i class="icon-file2"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta title ({{$value->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$value->meta_title}}" class="form-control" placeholder="Meta title" name="meta_title_{{$value->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta description ({{$value->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$value->meta_description}}" class="form-control" placeholder="Meta Description" name="meta_description_{{$value->language->label}}">

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            @endforeach





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