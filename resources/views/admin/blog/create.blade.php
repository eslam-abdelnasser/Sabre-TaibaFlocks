@extends('admin.layout')
@section('title' ,'Create Blog')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new Blog</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Fill <code>these fields</code> to add new blog. </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($languages as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open(['route'=>['blog.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach($languages as $language)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$language->label}}" aria-expanded="true" aria-labelledby="base-{{$language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Blog title ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="name_{{$language->label}}" value="{{old('category_name')}}" class="form-control" placeholder="Category name" name="name_{{$language->label}}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="timesheetinput1">Slug ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="slug_{{$language->label}}" value="{{old('slug_'.$language->label)}}" class="form-control" placeholder="Slug" name="slug_{{$language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Author name ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="author_{{$language->label}}" value="{{old('author_'.$language->label)}}" class="form-control" placeholder="Author" name="author_{{$language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput7">Description ({{$language->name }})</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea id="timesheetinput7" rows="5" class="form-control my-editor"  name="description_{{$language->label}}" placeholder="Description"></textarea>
                                                <div class="form-control-position">
                                                    <i class="icon-file2"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta title ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{old('meta_title_'.$language->label)}}" class="form-control" placeholder="Meta title" name="meta_title_{{$language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput1">Meta description ({{$language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{old('meta_description_'.$language->label)}}" class="form-control" placeholder="Meta Description" name="meta_description_{{$language->label}}">

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="issueinput5">Status</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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

@section('js')
    <script type="text/javascript">
        @foreach($languages as $language)
            $("#name_{{$language->label}}").on('change', function (e) {

            $("#slug_{{$language->label}}").val($("#name_{{$language->label}}").val());
        });

        @endforeach
    </script>
@endsection