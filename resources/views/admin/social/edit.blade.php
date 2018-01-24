


@extends('admin.layout')
@section('title' ,'Edit Social')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit Social media</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can edit social link </p>
                    </div>

                    {!! Form::model( $link ,  ['route'=>['social.update' , $link->id],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                         {!! method_field('put') !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1"> Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{$link->name}}" class="form-control" placeholder="name" name="name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Icon</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{$link->icon}}" class="form-control" placeholder="icon" name="icon">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Url</label>
                                <div class="position-relative">
                                   <input type="text" id="timesheetinput1" value="{{$link->url}}" class="form-control" placeholder="url" name="url">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Status</label>
                                <div class="position-relative">
                                    <select name="is_active" class="form-control" >
                                        <option value=""  disabled>Select Status</option>
                                        <option value="1" {!! $link->is_active == 1 ? 'selected':'' !!}>Active</option>
                                        <option value="0" {!! $link->is_active == 0 ? 'selected':'' !!}>Not Active</option>
                                    </select>

                                </div>
                            </div>
 

                             

                        </div>

                        <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Update  Social Link
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection