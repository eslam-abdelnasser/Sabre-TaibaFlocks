@extends('admin.layout')
@section('title' ,"Add user to group")

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">attach user to group</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can attach user : <code>{{$user->username }}</code> to a group</p>
                    </div>

                    {!! Form::open(['route'=>['attach.group' , $user->id],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">
 
                            <div class="form-group">
                                <label for="timesheetinput1">Groups</label>
                                <div class="position-relative">
                                    <select name="group" class="form-control" id="">
                                        <option value="">Select Group</option>
                                        @foreach($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div> 

                        </div>

                        <div class="form-actions right">
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Attach user to group
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection