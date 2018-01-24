@extends('admin.layout')
@section('title' ,'Create new Offer')

@section('content')
    <div class="row match-heigh">
        <div class="col-md-12 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-icons">Add new Offer</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block">

                        <div class="card-text">
                            <p>Here you can add new Offer </p>
                        </div>

                        {!! Form::open(['route'=>['offers.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Offer Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('offer_name')}}" class="form-control" placeholder="Offer name" name="offer_name">

                                </div>
                            </div>

                        </div>

                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Percent</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('percent')}}" class="form-control" placeholder="Percent" name="percent">

                                </div>
                            </div>

                        </div>

                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Groups</label>
                                <div class="position-relative">
                                    <select name="group_id" class="form-control" id="">
                                        <option value="">Select Group</option>
                                        @foreach($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>

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