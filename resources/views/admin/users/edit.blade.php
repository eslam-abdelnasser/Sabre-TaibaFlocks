@extends('admin.layout')
@section('title' ,'Edit User')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit user</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can edit  user </p>
                    </div>

                    {!! Form::model($user , ['route'=>['users.update' , $user->id],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        {!! method_field('put') !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="">Username</label>
                                <div class="position-relative">
                                    <input type="text" id="" value="{{$user->username}}" class="form-control" placeholder="username" name="username">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">First name</label>
                                <div class="position-relative">
                                    <input type="text" id="" value="{{ $user->first_name}}" class="form-control" placeholder="first name" name="first_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Last name</label>
                                <div class="position-relative">
                                    <input type="text" id="" value="{{$user->last_name}}" class="form-control" placeholder="last name" name="last_name">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <div class="position-relative">
                                    <input type="text" id="" value="{{$user->email}}" class="form-control" placeholder="email" name="email">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Country</label>
                                <div class="position-relative">
                                    <select name="country" class="form-control" id="">
                                        <option value="">Select country</option>
                                        @foreach($countries as $country)
                                                <option value="{{ $country->country_name }}" {!! $user->country == $country->country_name ? 'selected':'' !!}>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">City</label>
                                <div class="position-relative">
                                    <select name="city" class="form-control" id="">
                                        <option value="">Select city</option>
                                        @foreach($cities as $city)
                                                <option value="{{ $city->city_name }}" {!! $user->city == $city->city_name ? 'selected':'' !!}>{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Password</label>
                                <div class="position-relative">
                                  <input type="password" id=""  class="form-control" placeholder="password" name="password">

                                </div>
                            </div>

                             <div class="form-group">
                                <label for="">Confirm Password</label>
                                <div class="position-relative">
                                  <input type="password" id=""  class="form-control" placeholder="confirm password" name="password_confirmation">

                                </div>
                            </div>
 
                            <div class="form-group">
                                <label for="">Street</label>
                                <div class="position-relative">
                                    <input type="text" id="" value="{{$user->street }}" class="form-control" placeholder="street" name="street">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <div class="position-relative">
                                    <input type="text" id="" value="{{$user->mobile_number}}" class="form-control" placeholder="mobile number" name="mobile_number">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Points</label>
                                <div class="position-relative">
                                    <input type="number" id="" value="{{$user->points}}" class="form-control" placeholder="points" name="points">

                                </div>
                            </div>
                             

                        </div>

                        <div class="form-actions right">
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Update User info
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection