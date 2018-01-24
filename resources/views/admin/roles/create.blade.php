@extends('admin.layout')
@section('title' ,'Create new role')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new role</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new role </p>
                    </div>

                    {!! Form::open(['route'=>['roles.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Role Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('role_name')}}" class="form-control" placeholder="role name" name="role_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Role Display Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('role_display_name')}}" class="form-control" placeholder="role display name" name="role_display_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Role Description</label>
                                <div class="position-relative">
                                   <textarea name="role_description" class="form-control" id="" cols="30" rows="5" placeholder="role description">{{ old('role_description') }}</textarea>

                                </div>
                            </div>
 

                             

                        </div>

                        <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
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