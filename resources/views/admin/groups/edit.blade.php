@extends('admin.layout')
@section('title' ,'Edit Group')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit Group</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can edit  group </p>
                    </div>

                    {!! Form::model($group , ['route'=>['groups.update' , $group->id],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        {!! method_field('put') !!}
                        <div class="form-body">

                          
                            <div class="form-group">
                                <label for="timesheetinput1">Group Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{$group->name}}" class="form-control" placeholder="group name" name="group_name">

                                </div>
                            </div>

                           

                        </div>

                        <div class="form-actions right">
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Update Group info
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection