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
                    <h1 class="text-upper">Book now</h1>
                </section>

                <!-- breadcrumbs -->
                <section class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="home"><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Book now</li>
                    </ol>
                </section>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="row">

        {!! Form::open(['route'=>['booking.post'],'method'=>'POST' , 'id'=> 'payment_form']) !!}

        <div class="container">


            <div id="signupbox" style="height: 400px;" class="mainbox col-md-6 col-sm-8 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">{{trans('booking.fill_this_form')}}</div>
                    </div>
                    <div class="panel-body" >


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
                                       {{trans('booking.agree_with')}}  {{trans('booking.terms_condition')}}
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
                    <span class="total-price">{{$package->price}}</span> $

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




        <input type="hidden" value='no' name="points" id="points" />

        {!! Form::close() !!}


        <input type="hidden" name="total-price-package" id="total-price-package" value="" />
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Points</h4>
                </div>
                <div class="modal-body">
                    <label> Would you like to use your points ?</label>

                    <input class="checkbox1" type="radio" name="checkbox" value="yes" checked="checked"> <label > yes <span></span> </label>
                    <input class="checkbox1" type="radio" name="checkbox" value="no" checked="checked"> <label > no <span></span> </label>
                </div>

                <div class="row">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <h3 id="calculate" class="hidden"></h3>
                            </div>
                        </div>
                <div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="color: white" id="close_model">Close</button>
                </div>
            </div>

        </div>
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

            var discount = total - ({{$general_settings->points}}   * {{Auth::user()->points}}) ;
            $('#calculate').html('<p>'+discount +'</p>');

        }


        $(document).ready(function () {
            $('#payment_form').submit(function (e) {
                e.preventDefault();
                $('#myModal').modal('show')
                
                
                $('.checkbox1').click(function () {

                    $('#points').val($(this).val());
                    if($(this).val() == 'yes'){
                        if(!$(".total-price").val() ){
                            $('#calculate').html('<p>'+$(".total-price").val() +'</p>');
                        }else{

                            var discount = parseFloat($('#total-price-package').val()) - ({{$general_settings->points}}  ) * ({{Auth::user()->points}}) ;
                            $('#calculate').html('<p>'+ discount +'</p>');
                            $('#calculate').removeClass('hidden');

                        }

                    }else{
                        $('#calculate').html('');
                    }

                })
//        alert('hello');

                $('#close_model').click(function () {
                    $('#payment_form').unbind().submit();
                })

            });
        })
    </script>

@endsection