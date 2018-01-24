@extends('admin.layout')
@section('title' ,'Create new User')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new user</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new user </p>
                    </div>

                    {!! Form::open(['route'=>['users.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Username</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('username')}}" class="form-control" placeholder="username" name="username">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">First name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('first_name')}}" class="form-control" placeholder="first name" name="first_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Last name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('last_name')}}" class="form-control" placeholder="last name" name="last_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Email</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('email')}}" class="form-control" placeholder="email" name="email">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Country</label>
                                <div class="position-relative">
                                    <select name="country" class="form-control" id="">
                                        <option value="">Select country</option>
                                        @foreach($countries as $country)
                                                <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="timesheetinput1">City</label>
                                <div class="position-relative">
                                    <select name="city" class="form-control" id="">
                                        <option value="">Select city</option>
                                        @foreach($cities as $city)
                                                <option value="{{ $city->city_name }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>

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
                                <label for="timesheetinput1">Street</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('street')}}" class="form-control" placeholder="street" name="street">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Mobile Number</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('mobile_number')}}" class="form-control" placeholder="mobile number" name="mobile_number">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Points</label>
                                <div class="position-relative">
                                    <input type="number" id="timesheetinput1" value="{{old('points')}}" class="form-control" placeholder="points" name="points">

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