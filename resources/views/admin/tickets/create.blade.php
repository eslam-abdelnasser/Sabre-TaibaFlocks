@extends('admin.layout')
@section('title' ,'Create new Ticket')

@section('css')
    
    <style>
        /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
    </style>

@endsection

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new Ticket</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new Ticket </p>
                    </div>

                    {!! Form::open(['route'=>['tickets.store'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1">Name</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('ticket_name')}}" class="form-control" placeholder="name" name="ticket_name">

                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="timesheetinput1">Email</label>
                                <div class="position-relative">
                                    <input type="text" id="timesheetinput1" value="{{old('ticket_email')}}" class="form-control" placeholder="email" name="ticket_email">

                                </div>
                            </div>


                            <div class="form-group">

                             <label for="timesheetinput1">For a user ? </label>
                             <br>
                            <!-- Rounded switch -->

                            <label class="switch">

                              <input type="checkbox" id="element" class="test"  >
                              <div class="slider round"></div>
                            </label>
                            </div>






                            <div id="users" class="form-group hidden">
                                <label for="timesheetinput1">Users</label>
                                <div class="position-relative">
                                    <select name="user" class="form-control" id="">
                                        <option value="" selected="" disabled="">Select User</option>
                                        @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div> 


                             <div class="form-group">
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

                            <div class="form-group">
                                <label for="timesheetinput1">Message</label>
                                <div class="position-relative">
                                    <textarea name="message"  id="" cols="30" rows="10" placeholder="messege" class="form-control">{{old('message')}}</textarea>
                                     
                                </div>
                            </div>

                            
                             

                        </div>

                        <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Add Ticket
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection


@section('js')
    
    <script> 
      $(document).ready(function() {
            $('#element').on('click' , function(){
                 if($("#element").prop("checked")){
                    $('#users').removeClass('hidden');
                    
                 }else{
                    $('#users').addClass('hidden');
                 }
            })
      });
    </script>

@endsection