@extends('front.front_layout')

@section('title' , 'BOOK NOW')

@section('css')

@endsection

@section('breadcrumb')
    <!-- START #page-header -->

    <div class="banner-overlay">
        <div class="container">
            <div class="row">
                <section class="col-sm-6">
                    <h1 class="text-upper">{{trans('label.book_now')}}</h1>
                </section>

                <!-- breadcrumbs -->
                <section class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="home"><a href="{{ url('/') }}">{{trans('home.home')}}</a></li>
                        <li class="active">{{trans('label.book_now')}}</li>
                    </ol>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="row">

            {!! Form::open(['route'=>['booking.post'],'method'=>'POST']) !!}

            <div class="container">


            <div id="signupbox" class="mainbox col-md-6 col-sm-8 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">{{trans('booking.fill_this_form')}}</div>
                    </div>
                    <div class="panel-body" >

                            <div  class="form-group required">
                                <label for="first-name" class="control-label col-md-4  requiredField"> {{trans('booking.first_name')}}<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md  textinput textInput form-control" id="first-name" value="{{old('first_name')}}" maxlength="30" name="first_name" placeholder="{{trans('booking.first_name')}}" style="margin-bottom: 10px" type="text" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="second-name" class="control-label col-md-4  requiredField"> {{trans('booking.second_name')}}<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md  textinput textInput form-control" id="second-name" maxlength="30" value="{{old('second_name')}}" name="second_name" placeholder="{{trans('booking.second_name')}}" style="margin-bottom: 10px" type="text" />
                                </div>
                            </div>

                            <div  class="form-group required">
                                <label for="email" class="control-label col-md-4  requiredField">{{trans('booking.email')}}<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md emailinput form-control" id="email" name="email"  value="{{old('email')}}"  placeholder="{{trans('booking.email')}}" style="margin-bottom: 10px" type="email" />
                                </div>
                            </div>


                            <div  class="form-group required">
                                <label for="mobile-number" class="control-label col-md-4  requiredField"> {{trans('booking.mobile_number')}}<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <input class="input-md textinput textInput form-control" id="mobile-number" value="{{old('mobile_number')}}"  name="mobile_number" placeholder="{{trans('booking.mobile_number')}}" style="margin-bottom: 10px" type="text" />
                                </div>
                            </div>

                            <div   class="form-group required">
                                <label for="country" class="control-label col-md-4  requiredField"> {{trans('booking.country')}}<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <select class="form-control {{ $errors->has('country') ? ' has-error' : '' }}"  style="margin-bottom: 10px;" name="country" id="country">
                                        <option value="" selected="" disabled="">{{trans('booking.country')}}</option>
                                        @foreach($countries as $country)
                                            <option {!! old("country") == $country->country_name ? 'selected':'' !!} value="{{ $country->country_name }}">
                                                {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
				                                        <strong>{{ $errors->first('country') }}</strong>
				                                    </span>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div   class="form-group required">
                                <label for="city" class="control-label col-md-4  requiredField"> {{trans('booking.city')}}<span class="asteriskField">*</span> </label>
                                <div class="controls col-md-8 ">
                                    <select class="form-control {{ $errors->has('city') ? ' has-error' : '' }}"  style="margin-bottom: 10px;" name="city" id="city">
                                        <option value="" selected="" disabled="">{{trans('booking.city')}}</option>
                                        @foreach($cities as $city)
                                            <option {!! old("city") == $city->city_name ? 'selected':'' !!}  value="{{ $city->city_name }}">
                                                {{ $city->city_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div   class="form-group required">
                            <label for="street" class="control-label col-md-4  requiredField"> {{trans('booking.street')}}<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="street" name="street" value="{{old('street')}}"  placeholder="{{trans('booking.street')}}" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                            <div class="form-group required"  >
                                <label for="message" class="control-label col-md-4  requiredField"> {{trans('booking.your_message')}}<span class="asteriskField">*</span> </label>

                                <div class="controls col-md-8 ">
                                <textarea class="form-control" name="message" >{{old('message')}} </textarea>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="controls col-md-offset-4 col-md-8 ">
                                    <div id="div_id_terms" >
                                        <label for="terms-condition" class=" requiredField">
                                            <input class="input-ms checkboxinput" id="terms-condition" name="terms_condition" style="margin-bottom: 10px" type="checkbox" />
                                            {{trans('booking.agree_with')}} {{trans('booking.terms_condition')}}
                                        </label>
                                    </div>

                                </div>
                            </div>
                        <div class="form-group">
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="{{trans('booking.Submit')}}" class="btn btn-primary btn btn-info"  />

                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-md-4 pull-right extra-options">
                    <div class="row border-dashed">
                        <div class="col-md-12">
                            <h2>{{trans('booking.package_price')}} </h2>
                            <p> <span class="total-package-price">{{$package->price}}</span>  $</p>
                        </div>

                    </div>

                    <div class="row border-dashed">

                        <div class="col-md-12 ">

                            <h2> {{trans('booking.extra_options')}}</h2>
                            @foreach($package->options as $option)
                                <div class="checkbox checkbox-primary press-{{$option->id}}">
                                    <input id="checkbox{{$option->id}}" type="checkbox"  name="options[]" data-price="{{$option->price}}" onclick="totalIt()" value="{{$option->id}}">
                                    <label for="checkbox{{$option->id}}">
                                        @foreach($option->optionDescription as $description)
                                            @if($description->language->label == LaravelLocalization::getCurrentLocale() )
                                                {{$description->name}} <code> Cost </code> <span class="price">{{$option->price}}</span> $
                                            @endif
                                        @endforeach
                                    </label>
                                </div>
                            @endforeach
                        </div>




                    </div>
                    <div class="row total-price-block" >
                        <h2>Total price</h2>
                        <span class="total-price"> {{$package->price}}</span> $

                    </div>


                    <input type="hidden" name="total_price" class="total-price" value="" />
                    <input type="hidden" name="package"  value="{{encrypt($slug)}}" />

                </div>
                <div class="row ">
                    <div class="col-md-4 margin-bank-option">
                        <h2> {{trans('booking.choose_your_payment')}}</h2>
                        <ul class="option-bank">
                            <li>
                                <label class="label-radio">
                                    <input type="radio" class="input-radio" name="choose_bank" value="0">
                                    {{trans('booking.bank_transfer')}}
                                </label>
                                <p>{{trans('booking.bank_transfer_text')}}</p>
                            </li>



                            <li>
                                <label class="label-radio">
                                    <input type="radio" class="input-radio" name="choose_bank" value="1">
                                   {{trans('booking.credit_card')}}
                                </label>

                                <img src="{{asset('front/img/icon-card.png')}}"  class="icon-card-img" alt="">
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>


    {!! Form::close() !!}


    <input type="hidden" name="total-price-package" id="total-price-package" value="" />




    </div>

@endsection




@section('js')

    <script type="text/javascript">


        $('#total-price-package').val( parseFloat( $('.total-price').text()));
        function totalIt() {
            var input = document.getElementsByName("options[]");
            var total =  parseFloat($('#total-price-package').val());
            for (var i = 0; i < input.length; i++) {
                if (input[i].checked) {
                    total += parseFloat(input[i].getAttribute('data-price')) ;
                }
            }

            $('.total-price').text("$" + total.toFixed(2));
            $('.total-price').val(total.toFixed(2));

        }



    </script>
    <script language="javascript">
        populateCountries("country", "city",'{{trans('booking.country')}}');

    </script>
@endsection