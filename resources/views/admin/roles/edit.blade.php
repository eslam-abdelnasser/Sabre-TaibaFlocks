@extends('admin.layout')
@section('title' ,'Edit role')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit role</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can edit role </p>
                    </div>

                    {!! Form::model( $role ,  ['route'=>['roles.update' , $role->id],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                            {!! method_field('put') !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Role Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{ $role->name }}" class="form-control" placeholder="role name" name="role_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Role Display Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{ $role->display_name}}" class="form-control" placeholder="role display name" name="role_display_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Role Description</label>
                                <div class="position-relative">
                                   <textarea name="role_description" class="form-control" id="" cols="30" rows="5" placeholder="role description">{{ $role->description }}</textarea>

                                </div>
                            </div>
 

                             

                        </div>

                        <div class="form-actions right">
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Update
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection