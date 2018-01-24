@extends('front.front_layout')

@section('title' , 'User Profile')

@section('css')
        <style>
            .has-error{
                color:red;
                border: 2px solid red ;
            }

            .help-block{
                color:red;
            }
        </style>
@endsection

@section('breadcrumb')
<!-- START #page-header -->

              <div class="banner-overlay">
                    <div class="container">
                        <div class="row">
                            <section class="col-sm-6">
                                <h1 class="text-upper">Profile</h1>
                            </section>

                            <!-- breadcrumbs -->
                            <section class="col-sm-6">
                                <ol class="breadcrumb">
                                    <li class="home"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="active">Profile</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>

@endsection

@section('content')


         <div class="row">
                        <!-- START #page -->
                        <div id="page" class="col-md-8">
                            <div class="user-profile">
                                <!-- Sidebar recent popular posts -->
                                <!-- START TABS -->
                                <ul class="nav nav-tabs text-upper">
                                    <li class="active"><a href="#userinfo" data-toggle="tab">User Info</a></li>
                                    <li><a href="#incomming" data-toggle="tab">Incomming trips</a></li>
                                    <li><a href="#previous" data-toggle="tab">previous trips</a></li>
                                    <li><a href="#cancelled" data-toggle="tab">cancelled trips</a></li>
                                    <li><a href="#points" data-toggle="tab">Show Points</a></li>
                                </ul>
                                <!-- END TABS -->

                                <!-- START TAB CONTENT -->
                                <div class="tab-content clearfix marb30">
                                    <!-- START TAB 1 -->
                                    <div class="tab-pane active mart20" id="userinfo">
                                       {!! Form::open(['url'=>[LaravelLocalization::setLocale().'/profile'],'method'=>'POST','role'=>'form']) !!}
                                            <fieldset>
                                                <ul class="formFields list-unstyled">
                                                    <li class="row">
                                                        <div class="col-md-6">
                                                            <label>Username <span class="required small">(Required)</span></label>
                                                            <input type="text"  class="form-control disable-input {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ $user->username }}" />
                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Email <span class="required small">(Required)</span></label>
                                                            <input type="text" class="form-control disable-input {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $user->email }}" />
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li class="row">
                                                        <div class="col-md-6">
                                                            <label>First name <span class="required small">(Required)</span></label>
                                                            <input type="text" class="form-control disable-input" name="first_name" value="{{ $user->first_name }}" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Last name <span class="required small">(Required)</span></label>
                                                            <input type="text" class="form-control disable-input" name="last_name" value="{{ $user->last_name }}" />
                                                        </div>
                                                    </li>
                                                    <li class="row">
                                                        <div class="col-md-6">
                                                            <label>Country <span class="required small">(Required)</span></label>
                                                           <select class="form-control {{ $errors->has('country') ? ' has-error' : '' }}" name="country">
                                                                <option value="" selected="" disabled="">Select Country</option>
                                                                @foreach($countries as $country)
                                                                    <option {!! $user->country == $country->country_name ? 'selected':'' !!} value="{{ $country->country_name }}">
                                                                        {{ $country->country_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>City <span class="required small">(Required)</span></label>
                                                            <select class="form-control {{ $errors->has('city') ? ' has-error' : '' }}" name="city">
                                                                <option value="" selected="" disabled="">Select City</option>
                                                                @foreach($cities as $city)
                                                                    <option {!! $user->city == $city->city_name ? 'selected':'' !!}  value="{{ $city->city_name }}">
                                                                        {{ $city->city_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li class="row">
                                                        <div class="col-md-12">
                                                            <label>Street <span class="required small">(Required)</span></label>
                                                            <input type="text" class="form-control disable-input" name="street" value="{{ $user->street }}" />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Mobile number <span class="required small">(Required)</span></label>
                                                            <input type="text" class="form-control disable-input" name="mobile_number" value="{{ $user->mobile_number }}" />
                                                        </div>
                                                    </li>
                                                    <li class="row">
                                                        <div class="col-md-6">
                                                            <label>Password <span class="required small">(Required)</span></label>
                                                            <input type="password" class="form-control disable-input {{ $errors->has('password') ? ' has-error' : '' }}" name="password" value="" />
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Confirm password <span class="required small">(Required)</span></label>
                                                            <input type="password" class="form-control disable-input {{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" value="" />
                                                            @if ($errors->has('password_confirmation'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </li>


                                                    <li class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary btn-lg text-upper disable-input"  value="Save" />
                                                            <button class="btn btn-danger" id="edit" > Edit</button>
                                                            <span class="required small">*Your email will never published.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END TAB 1 -->

                                    <!-- START TAB 2 -->
                                    <div class="tab-pane" id="incomming">
                                        @if(count($packages_incoming) > 0 )
                                        @foreach($packages_incoming as $package)
                                        @php
                                         $package_date = strtotime($package->journey_start_date);
                                         $date = date('m/d/Y h:i:s', time());
                                         $current_date = strtotime($date);
                                         @endphp

                                         @if($package->status != '0')


                                        <div class="booking gray clearfix box-shadow1">
                                            <div class="selected-deal">
                                                @foreach($package->packageDescription as $desc)
                                                    @if($language->id == $desc->lang_id)
                                                    <h2 class="marb20">{{ $desc->name  }}</h2>
                                                    @endif

                                                @endforeach

                                                <div class="ft-item">
                                                    <span class="ft-image">
                                                        <img src='{!! asset("uploads/packages/cover/$package->image_url") !!}' alt="featured Scroller" />
                                                    </span>
                                                    <div class="ft-data">
                                                        @if(count($package->options))
                                                        @foreach($package->options as $option)
                                                        @foreach($option->optionDescription as $description)
                                                        @if($language->id == $description->lang_id)
                                                        <!-- this may be will be options -->
                                                        <a class="ft-hotel text-upper" href="#">{{ $description->name }}</a>
                                                        {{-- <a class="ft-plane text-upper" href="#">Air Ticket</a>
                                                        <a class="ft-tea text-upper" href="#">Break Fast</a> --}}
                                                        @endif
                                                        @endforeach
                                                        @endforeach


                                                        @endif
                                                    </div>
                                                    <div class="ft-foot">
                                                         @foreach($package->packageDescription as $desc)
                                                            @if($language->id == $desc->lang_id)
                                                                 <h4 class="ft-title text-upper"><a href="#">{!!   str_limit($desc->description , 15 ) !!}</a></h4>
                                                            @endif
                                                        @endforeach
                                                        <span class="ft-offer text-upper">Starting From {{ $package->price }} $</span>
                                                    </div>
                                                    <div class="ft-foot-ex">
                                                        <span class="ft-date text-upper alignleft">{{ date("F j, Y, g:i a", strtotime($package->journey_start_date)) }}</span>
                                                        {{-- <span class="ft-temp alignright">17&#730;c</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booking-status">
                                                <h2 class="marb20">Package Details and options</h2>
                                                @foreach($package->packageDescription as $desc)
                                                          @if($language->id == $desc->lang_id)
                                                              <p>{!!   $desc->description !!}</p>
                                                                 <span class="checkbox-container">

                                                                      <!-- may be this is the status of package user status -->
                                                                         @if(count($package->options))
                                                                          @foreach($package->options as $option)
                                                                          @foreach($option->optionDescription as $description)
                                                                          @if($language->id == $description->lang_id)
                                                                          <!-- this may be will be options -->
                                                                           <label>{{ $description->name }}</label>
                                                                          {{-- <a class="ft-hotel text-upper" href="#">{{ $description->name }}</a> --}}
                                                                          {{-- <a class="ft-plane text-upper" href="#">Air Ticket</a>
                                                                          <a class="ft-tea text-upper" href="#">Break Fast</a> --}}
                                                                          @endif
                                                                          @endforeach
                                                                          @endforeach


                                                                          @endif
                                                                       
                                                                       
                                                                  </span>

                                                          @endif
                                                      @endforeach
                                            </div>
                                        </div>

                                        @else


                                                 <div class="booking gray clearfix box-shadow1">
                                                    <div class="selected-deal">
                                                    <h3>no up coming trips man </h3>
                                                    </div>
                                                 </div>
                                                 @php break; @endphp

                                        @endif

                                            @endforeach
                                        @else
                                             <div class="booking gray clearfix box-shadow1">
                                                    <div class="selected-deal">
                                                    <h3>no up coming trips man </h3>
                                                    </div>
                                                 </div>

                                        @endif
                                    </div>
                                    <!-- END TAB 2 -->
                                    <!-- START TAB 3 -->
                                    <div class="tab-pane" id="previous">

                                      @if(count($packages))
                                      @foreach($packages as $package)
                                      @php
                                       $package_date = strtotime($package->journey_start_date);
                                       $date = date('m/d/Y h:i:s', time());
                                       $current_date = strtotime($date);

                                       @endphp
                                        
                                       @if($package_date < $current_date )


                                      <div class="booking gray clearfix box-shadow1">
                                          <div class="selected-deal">
                                              @foreach($package->packageDescription as $desc)
                                                  @if($language->id == $desc->lang_id)
                                                  <h2 class="marb20">{{ $desc->name  }}</h2>
                                                  @endif

                                              @endforeach

                                              <div class="ft-item">
                                                  <span class="ft-image">
                                                      <img src='{!! asset("uploads/packages/cover/$package->image_url") !!}' alt="featured Scroller" />
                                                  </span>
                                                  <div class="ft-data">
                                                      @if(count($package->options))
                                                      @foreach($package->options as $option)
                                                      @foreach($option->optionDescription as $description)
                                                      @if($language->id == $description->lang_id)
                                                      <!-- this may be will be options -->
                                                      <a class="ft-hotel text-upper" href="#">{{ $description->name }}</a>
                                                      {{-- <a class="ft-plane text-upper" href="#">Air Ticket</a>
                                                      <a class="ft-tea text-upper" href="#">Break Fast</a> --}}
                                                      @endif
                                                      @endforeach
                                                      @endforeach


                                                      @endif
                                                  </div>
                                                  <div class="ft-foot">
                                                       @foreach($package->packageDescription as $desc)
                                                          @if($language->id == $desc->lang_id)
                                                               <h4 class="ft-title text-upper"><a href="#">{{ str_limit($desc->description , 15 ) }}</a></h4>
                                                          @endif
                                                      @endforeach
                                                      <span class="ft-offer text-upper">Starting From {{ $package->price }} $</span>
                                                  </div>
                                                  <div class="ft-foot-ex">
                                                      <span class="ft-date text-upper alignleft">{{ date("F j, Y, g:i a", strtotime($package->journey_start_date)) }}</span>
                                                      {{-- <span class="ft-temp alignright">17&#730;c</span> --}}
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="booking-status">
                                              <h2 class="marb20">Package Details and options</h2>
                                                @foreach($package->packageDescription as $desc)
                                                          @if($language->id == $desc->lang_id)
                                                              <p>{{ $desc->description }}</p>
                                                                 <span class="checkbox-container">

                                                                      <!-- may be this is the status of package user status -->
                                                                         @if(count($package->options))
                                                                          @foreach($package->options as $option)
                                                                          @foreach($option->optionDescription as $description)
                                                                          @if($language->id == $description->lang_id)
                                                                          <!-- this may be will be options -->
                                                                           <label>{{ $description->name }}</label>
                                                                          {{-- <a class="ft-hotel text-upper" href="#">{{ $description->name }}</a> --}}
                                                                          {{-- <a class="ft-plane text-upper" href="#">Air Ticket</a>
                                                                          <a class="ft-tea text-upper" href="#">Break Fast</a> --}}
                                                                          @endif
                                                                          @endforeach
                                                                          @endforeach


                                                                          @endif
                                                                       
                                                                       
                                                                  </span>

                                                          @endif
                                                      @endforeach
                                          </div>
                                      </div>

                                      @else

                                               <div class="booking gray clearfix box-shadow1">
                                                  <div class="selected-deal">
                                                  <h3>no up previous trips man </h3>
                                                  </div>
                                               </div>
                                             @php break; @endphp
                                      @endif

                                          @endforeach
                                      @else
                                             <div class="booking gray clearfix box-shadow1">
                                                    <div class="selected-deal">
                                                    <h3>no previous trips man </h3>
                                                    </div>
                                                 </div>

                                        @endif
                                    </div>
                                    <!-- END TAB 3 -->
                                    <!-- START TAB 4 -->
                                    <div class="tab-pane" id="cancelled">

                                           
                                    
                                      @if(count($canceld_packages) > 0)
                                      @foreach($canceld_packages as $package) 
                                      <div class="booking gray clearfix box-shadow1">
                                          <div class="selected-deal">
                                              @foreach($package->packageDescription as $desc)
                                                  @if($language->id == $desc->lang_id)
                                                  <h2 class="marb20">{{ $desc->name  }}</h2>
                                                  @endif

                                              @endforeach

                                              <div class="ft-item">
                                                  <span class="ft-image">
                                                      <img src='{!! asset("uploads/packages/cover/$package->image_url") !!}' alt="featured Scroller" />
                                                  </span>
                                                  <div class="ft-data">
                                                      @if(count($package->options))
                                                      @foreach($package->options as $option)
                                                      @foreach($option->optionDescription as $description)
                                                      @if($language->id == $description->lang_id)
                                                      <!-- this may be will be options -->
                                                      <a class="ft-hotel text-upper" href="#">{{ $description->name }}</a>
                                                      {{-- <a class="ft-plane text-upper" href="#">Air Ticket</a>
                                                      <a class="ft-tea text-upper" href="#">Break Fast</a> --}}
                                                      @endif
                                                      @endforeach
                                                      @endforeach


                                                      @endif
                                                  </div>
                                                  <div class="ft-foot">
                                                       @foreach($package->packageDescription as $desc)
                                                          @if($language->id == $desc->lang_id)
                                                               <h4 class="ft-title text-upper"><a href="#">{{ str_limit($desc->description , 15 ) }}</a></h4>
                                                          @endif
                                                      @endforeach
                                                      <span class="ft-offer text-upper">Starting From {{ $package->price }} $</span>
                                                  </div>
                                                  <div class="ft-foot-ex">
                                                      <span class="ft-date text-upper alignleft">{{ date("F j, Y, g:i a", strtotime($package->journey_start_date)) }}</span>
                                                      {{-- <span class="ft-temp alignright">17&#730;c</span> --}}
                                                  </div>
                                              </div>
                                          </div>


                                          <div class="booking-status">
                                              <h2 class="marb20">Package Details and options</h2>
                                                @foreach($package->packageDescription as $desc)
                                                          @if($language->id == $desc->lang_id)
                                                              <p>{{ $desc->description }}</p>
                                                                 <span class="checkbox-container">

                                                                      <!-- may be this is the status of package user status -->
                                                                         @if(count($package->options))
                                                                          @foreach($package->options as $option)
                                                                          @foreach($option->optionDescription as $description)
                                                                          @if($language->id == $description->lang_id)
                                                                          <!-- this may be will be options -->
                                                                           <label>{{ $description->name }}</label>
                                                                          {{-- <a class="ft-hotel text-upper" href="#">{{ $description->name }}</a> --}}
                                                                          {{-- <a class="ft-plane text-upper" href="#">Air Ticket</a>
                                                                          <a class="ft-tea text-upper" href="#">Break Fast</a> --}}
                                                                          @endif
                                                                          @endforeach
                                                                          @endforeach


                                                                          @endif
                                                                       
                                                                       
                                                                  </span>

                                                          @endif
                                                      @endforeach
                                              
                                             
                                          </div>
                                      </div>

                                   

                                          @endforeach
                                      @else
                                            <div class="booking gray clearfix box-shadow1">
                                                  <div class="selected-deal">
                                                  <h3>no canceld trips man  </h3>
                                                  </div>
                                               </div>
                                             {{-- @php break; @endphp --}}
                                      @endif
                                    

                                     </div>
                                    <!-- END TAB 4 -->

                                    <div class="tab-pane" id="points">


                                                    <div class="booking gray clearfix box-shadow1">
                                                        <div class="selected-deal">

                                                            <p>your points <span class="point_number">{{Auth::user()->points}}</span></p>
                                                        </div>
                                                    </div>
                                    </div>
                                </div>
                                <!-- END TAB CONTENT -->
                            </div>

                            <div class="user-profile ticket-test">
                                <!-- Sidebar recent popular posts -->
                                <!-- START TABS -->
                                <ul class="nav nav-tabs text-upper">
                                    <li class="active"><a href="#create-ticket" data-toggle="tab">Create Ticket</a></li>
                                    <li><a href="#tickets" data-toggle="tab">Tickets</a></li>

                                </ul>
                                <!-- END TABS -->

                                <!-- START TAB CONTENT -->
                                <div class="tab-content clearfix marb30">
                                    <!-- START TAB 1 -->
                                    <div class="tab-pane active mart20" id="create-ticket">
                                      
                                         {!! Form::open(['url'=>[LaravelLocalization::setLocale().'/ticket'],'method'=>'POST','role'=>'form']) !!}
                                            <fieldset>
                                                <ul class="formFields list-unstyled">
                                                    <li class="row">
                                                        <div class="col-md-6">
                                                            <label>Name <span class="required small">(Required)</span></label>
                                                            <input type="text" placeholder="enter your email"  class="form-control {{ $errors->has('ticket_name') ? ' has-error' : '' }}" name="ticket_name" value="{{ old('name') }}" />
                                                             @if ($errors->has('ticket_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('ticket_name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Email <span class="required small">(Required)</span></label>
                                                            <input type="text" class="form-control {{ $errors->has('ticket_email') ? ' has-error' : '' }}" placeholder="enter your email" name="ticket_email" value="{{ old('email') }}" />
                                                             @if ($errors->has('ticket_email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('ticket_email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </li>


                                                    <li class="row">
                                                        <div class="col-md-12">
                                                            <label>Deparment <span class="required small">(Required)</span></label>
                                                            <select class="form-control {{ $errors->has('department') ? ' has-error' : '' }}" name="department">
                                                                <option value="" selected disabled="">Select Department</option>
                                                                <option value="sales" {{ (old("department") == 'sales' ? "selected":"") }}>sales</option>
                                                                <option value="accountant" {{ (old("department") == 'accountant' ? "selected":"") }}>accountant</option>
                                                                <option value="customer service" {{ (old("department") == 'customer service' ? "selected":"") }}>customer service</option>
                                                            </select>
                                                             @if ($errors->has('department'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('department') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li class="row">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control {{ $errors->has('message') ? ' has-error' : '' }}" cols="6" placeholder="enter your message" name="message"></textarea>
                                                             @if ($errors->has('message'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('message') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </li>



                                                    <li class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary btn-lg text-upper"  value="Send" />

                                                            <span class="required small">*Your email will never published.</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END TAB 1 -->

                                    <!-- START TAB 2 -->
                                    <div class="tab-pane" id="tickets">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h1 class="text-center">
                                                        List Tickets.
                                                    </h1>

                                                </div>
                                                <div id="no-more-tables">
                                                    <table id="example" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Department</th>
                                                            <th>Status</th>
                                                            <th>Creation date</th>
                                                           
                                                        </tr>
                                                        </thead>
                                                        <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Department</th>
                                                            <th>Status</th>
                                                            <th>Creation date</th>
                                                        </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        @if($tickets->count())
                                                        @foreach($tickets as $ticket)
                                                        <tr>
                                                           <td>{{ $loop->iteration }}</td>  
                                                           <td>{{ $ticket->name }}</td>
                                                           <td>{{ $ticket->email }}</td>
                                                           <td>{{ $ticket->department }}</td>
                                                           <td>{!! $ticket->status == 0 ? 'opened(under reviewing)':'closed(means it has been solved)' !!}</td>
                                                           <td>{{ date('Y-m-d' , strtotime($ticket->created_at ))}}</td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="5" class="text-center">no tickets found</td>
                                                            </tr>
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                    </div>
                                    <!-- END TAB 2 -->

                                </div>
                                <!-- END TAB CONTENT -->
                            </div>


                        </div>
                        <!-- END #page -->




             <!-- START #sidebar -->
             <aside id="sidebar" class="col-md-4">
                 <div class="sidebar-widget">
                     <!-- Sidebar recent popular posts -->
                     <!-- START TABS -->
                     <ul class="nav nav-tabs text-upper">

                         <li class="active"><a href="#recent-posts" data-toggle="tab">{{trans('label.question')}}</a></li>

                     </ul>
                     <!-- END TABS -->

                     <!-- START TAB CONTENT -->
                     <div class="tab-content gray box-shadow1 clearfix marb30">


                         <!-- START TAB 2 -->
                         <div class="tab-pane active" id="recent-posts">
                             {!! Form::open(['route'=>['question.post'],'method'=>'POST']) !!}
                             <div class="top-fields" >
                                 <div class="input-field col-md-12"><input type="text"  name="email" placeholder="email" /></div>
                                 <div class="input-field col-md-12"><input type="text" name="phone" placeholder="phone" /></div>
                                 <div class="input-field col-md-12">
                                     <textarea class="form-control" name="message" style="background-color: white" placeholder="Your question" ></textarea>
                                 </div>
                                 <div class="submit-btn col-md-6">
                                     <input type="submit" value="{{trans('label.submit')}}" />
                                 </div>
                             </div>

                             <{!! Form::close() !!}
                         </div>
                         <!-- END TAB 2 -->
                     </div>
                     <!-- END TAB CONTENT -->
                 </div>


                 <div class="sidebar-widget">
                     <!-- Sidebar About -->
                     <div class="tab-manager plan-tour rm-margin">

                         <ul class="nav nav-tabs">
                             <li class="active"><a data-toggle="tab" href="#home">{{trans('label.Book-hotel')}}</a></li>
                             <li><a data-toggle="tab" href="#menu1">{{trans('label.Book-package')}}</a></li>

                         </ul>

                         <div class="tab-content">
                             <div id="home" class="tab-pane fade in active">
                                 <form class="">
                                     <div class="top-fields">
                                         <div class="input-field col-md-6"><input type="text" placeholder="1. Where to go?" /></div>
                                         <div class="input-field col-md-6"><input type="text" placeholder="2. What to do?" /></div>
                                         <div class="input-field col-md-12 schedule">
                                             <input type="text" class="date-picker" value="" placeholder="3. From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy" />
                                             <i class="calendar-icon"></i>
                                             <input type="text" class="date-picker" value="" placeholder="4. Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" />
                                         </div>
                                     </div>
                                     <div class="bottom-fields">

                                         <div class="submit-btn col-md-6">
                                             <input type="submit" value="{{trans('label.search')}}" />
                                         </div>
                                     </div>
                                 </form>
                             </div>
                             <div id="menu1" class="tab-pane fade">
                                 <form class="">
                                     <div class="top-fields">
                                         <div class="input-field col-md-6 "><input type="text" placeholder="1. Where to go?" /></div>
                                         <div class="input-field col-md-6 "><input type="text" placeholder="2. What to do?" /></div>
                                         <div class="input-field col-md-12 schedule">
                                             <input type="text" class="date-picker" value="" placeholder="3. From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy" />
                                             <i class="calendar-icon"></i>
                                             <input type="text" class="date-picker" value="" placeholder="4. Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" />
                                         </div>
                                     </div>
                                     <div class="bottom-fields">

                                         <div class="submit-btn col-md-6">
                                             <input type="submit" value="{{trans('label.search')}}" />
                                         </div>
                                     </div>
                                 </form>
                             </div>

                         </div>

                     </div>
                 </div>
                 <div class="sidebar-widget">
                     <img src="http://placehold.it/400x200" class="img-responsive" alt="advertise"/>
                 </div>
                 <div class="sidebar-widget">
                     <!-- Sidebar Newsletter -->
                     <div class="styled-box gray">
                         <h3 class="text-upper">{{trans('label.newsletter')}}</h3>
                         <form action="#" method="post">
                             <label>{{trans('label.email')}}</label>
                             <input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
                             <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="{{trans('label.subscribe')}}" />
                         </form>
                     </div>
                 </div>



             </aside>
             <!-- END #sidebar -->
                    </div>
                    <!-- END .row -->

@endsection

@section('js')


        <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );
    $('.disable-input').prop("disabled", true);
    $('#edit').click(function (e) {
        e.preventDefault();
        $('.disable-input').prop("disabled", false);
    })
</script>

@endsection
