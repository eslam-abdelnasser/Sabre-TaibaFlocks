@extends('admin.layout')
@section('title' ,'Showing ticket messege')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ticket Messege</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    @foreach($ticket_details as $detail)
                    <div class="card-block card-dashboard">

                        <p class="card-text"><code>Showing ticket messege : </code>{{ $detail->description }}, <code> Added by : </code> {{$detail->admin->email}}  <code> Created at : </code> {{$detail->created_at}}</p>
                    </div>

                    @endforeach
                    
                        
                   
                     
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add you updates message</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    {{--<div class="card-block card-dashboard">--}}
                        {{--<p class="card-text"><code>Showing ticket messege : </code>{{ $ticket->message }} </p>--}}
                    {{--</div>--}}

                    {!! Form::open(['route'=>['ticket.post'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}

                    <div class="form-body" style="padding: 20px">
                        <div class="form-group">
                            <label for="timesheetinput7">Message</label>
                            <div class="position-relative has-icon-left">
                                <textarea id="timesheetinput7" rows="5" class="form-control"  name="message" placeholder="Description"></textarea>
                                <div class="form-control-position">
                                    <i class="icon-file2"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="{{encrypt($id)}}" name="ticket" />

                    <div class="form-actions right">
                        <button type="reset" class="btn btn-warning mr-1">
                            <i class="icon-cross2"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-check2"></i> Add you update
                        </button>
                    </div>

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->


@endsection