@extends('admin.layout')
@section('title' ,'Create new language')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new language</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new language <code>language name</code> , <code>Label</code> and  <code>Status</code>. </p>
                    </div>

                    {!! Form::open(['route'=>['languages.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Language Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('language_name')}}" class="form-control" placeholder="Language name" name="language_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput2">Language label</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput2" value="{{old('language_label')}}"  class="form-control" placeholder="language label" name="language_label">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issueinput5">Status</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-actions right">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Save
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection