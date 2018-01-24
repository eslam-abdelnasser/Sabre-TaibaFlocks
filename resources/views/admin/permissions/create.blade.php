@extends('admin.layout')
@section('title' ,'Create new permission')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new permission</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new permission </p>
                    </div>

                    {!! Form::open(['route'=>['permissions.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Permission Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('permission_name')}}" class="form-control" placeholder="permission name" name="permission_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Permission Display Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('permission_display_name')}}" class="form-control" placeholder="permission display name" name="permission_display_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Permission Description</label>
                                <div class="position-relative">
                                   <textarea name="permission_description" class="form-control" id="" cols="30" rows="5" placeholder="permission description">{{ old('permission_description') }}</textarea>

                                </div>
                            </div>
 

                             

                        </div>

                        <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Add Permission
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection