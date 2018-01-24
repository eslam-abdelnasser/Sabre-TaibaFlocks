@extends('admin.layout')
@section('title' ,"Edit permission under role : $role->name")

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit permission under role : <code>{{ $role->name }}</code></h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can update permission attached to some role </p>
                    </div>

                    {!! Form::model( $permission , ['url'=>["admin/roles/$role->id/permissions/$permission->id"],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        {!! method_field('put') !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Permission Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{ $permission->name }}" class="form-control" placeholder="permission name" name="permission_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Permission Display Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{ $permission->display_name }}" class="form-control" placeholder="permission display name" name="permission_display_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Permission Description</label>
                                <div class="position-relative">
                                   <textarea name="permission_description" class="form-control" id="" cols="30" rows="5" placeholder="permission description">{{ $permission->description }}</textarea>

                                </div>
                            </div>
 

                             

                        </div>

                        <div class="form-actions right">
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Update  Permission
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection