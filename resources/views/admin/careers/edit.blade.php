@extends('admin.layout')
@section('title' ,'Edit Career')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Career</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Edit at  <code>these fields</code> to update career . </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($languages as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open(['route'=>['careers.update',$career->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach($career->description as $careerDescription)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$careerDescription->language->label}}" aria-expanded="true" aria-labelledby="base-{{$careerDescription->language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Blog title ({{$careerDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$careerDescription->title}}" class="form-control" placeholder="Category name" name="name_{{$careerDescription->language->label}}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="timesheetinput1">Slug ({{$careerDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="slug_{{$careerDescription->language->label}}" value="{{$careerDescription->slug}}" class="form-control" placeholder="Slug" name="slug_{{$careerDescription->language->label}}">

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="timesheetinput7">Description ({{$careerDescription->language->name }})</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea id="timesheetinput7" rows="5" class="form-control my-editor"  name="description_{{$careerDescription->language->label}}" placeholder="Description">{{$careerDescription->description}}</textarea>
                                                <div class="form-control-position">
                                                    <i class="icon-file2"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta title ({{$careerDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$careerDescription->meta_title}}" class="form-control" placeholder="Meta title" name="meta_title_{{$careerDescription->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta description ({{$careerDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$careerDescription->meta_description}}" class="form-control" placeholder="Meta Description" name="meta_description_{{$careerDescription->language->label}}">

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="issueinput5">Status</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                    @if($career->status == '1')
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    @else
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Inactive</option>
                                    @endif
                                </select>
                            </div>


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