@extends('admin.layout')
@section('title' ,'Ticket To Action')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit Ticket -- Taking action</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can Take actions for all tickets by changing status from opened to closed after solving others problems </p>
                    </div>

                    {!! Form::model($ticket , ['route'=>['tickets.update' , $ticket->id],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        {!! method_field('put') !!}
                        <div class="form-body">

                          
                            <div class="form-group">
                                <label for="issueinput5">Status</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Ticket Status">
                                   @if($ticket->status == '1')
                                    <option value="1" selected disabled=""> Closed</option>
                                    <option value="0">Opened</option>
                                   @else
                                        <option value="1">Closed</option>
                                        <option value="0" selected disabled="">Opened</option>
                                   @endif
                                </select>
                            </div>

                           

                        </div>

                        <div class="form-actions right">
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Update Ticket Status
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection