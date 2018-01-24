@extends('admin.layout')
@section('title' ,'Edit Blog')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Blog</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Edit at  <code>these fields</code> to update Blog . </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($languages as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open(['route'=>['blog.update',$blog->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach($blog->blogDescription as $blogDescription)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$blogDescription->language->label}}" aria-expanded="true" aria-labelledby="base-{{$blogDescription->language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Blog title ({{$blogDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$blogDescription->title}}" class="form-control" placeholder="Category name" name="name_{{$blogDescription->language->label}}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="timesheetinput1">Slug ({{$blogDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="slug_{{$blogDescription->language->label}}" value="{{$blogDescription->slug}}" class="form-control" placeholder="Slug" name="slug_{{$blogDescription->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Author ({{$blogDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="author_{{$blogDescription->language->label}}" value="{{$blogDescription->author}}" class="form-control" placeholder="Author" name="author_{{$blogDescription->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput7">Description ({{$blogDescription->language->name }})</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea id="timesheetinput7" rows="5" class="form-control my-editor"  name="description_{{$blogDescription->language->label}}" placeholder="Description">{{$blogDescription->description}}</textarea>
                                                <div class="form-control-position">
                                                    <i class="icon-file2"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta title ({{$blogDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$blogDescription->meta_title}}" class="form-control" placeholder="Meta title" name="meta_title_{{$blogDescription->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta description ({{$blogDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$blogDescription->meta_description}}" class="form-control" placeholder="Meta Description" name="meta_description_{{$blogDescription->language->label}}">

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="issueinput5">Status</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                    @if($blog->status == '1')
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