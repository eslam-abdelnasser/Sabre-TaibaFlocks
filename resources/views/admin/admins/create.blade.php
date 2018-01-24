@extends('admin.layout')
@section('title' ,'Create new Admin')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new admin</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new admin </p>
                    </div>

                    {!! Form::open(['route'=>['admin-users.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1"> Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('name')}}" class="form-control" placeholder="name" name="name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Email</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('email')}}" class="form-control" placeholder="email" name="email">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Password</label>
                                <div class="position-relative">
                                  <input type="password" id="timesheetinput1"  class="form-control" placeholder="password" name="password">

                                </div>
                            </div>

                             <div class="form-group">
                                <label for="timesheetinput1">Confirm Password</label>
                                <div class="position-relative">
                                  <input type="password" id="timesheetinput1"  class="form-control" placeholder="confirm password" name="password_confirmation">

                                </div>
                            </div>
 
                             <div class="form-group">
                                <label for="timesheetinput1">Admin - Role</label>
                                <select name="role" class="form-control" id="">
                                    <option value="" selected disabled="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
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