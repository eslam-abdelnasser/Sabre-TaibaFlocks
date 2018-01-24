@extends('admin.layout')
@section('title' ,'Create Package')
@section('css')


@endsection
@section('content')
<!-- Basic form layout section start -->
<section id="basic-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="bordered-layout-basic-form">Review details</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <div class="card-text">
                            <p> Review details <code>you can change status</code> .</p>
                        </div>
                        {{--<form class="form form-horizontal form-bordered">--}}
                            {!! Form::open(['route'=>['update.review',$review->id],'method'=>'PUT','class'=>'form form-horizontal form-bordered','role'=>'form']) !!}

                            <div class="form-body">


                                <h4 class="form-section"><i class="icon-clipboard4"></i> Review details</h4>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput5">email</label>
                                    <div class="col-md-9">
                                        <input type="text" id="projectinput5"  disabled class="form-control" placeholder="Company Name" value="{{$review->email}}" name="company">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="projectinput6">Status</label>
                                    <div class="col-md-9">
                                        <select id="projectinput6" name="status" class="form-control">

                                            <option value="1" {{$review->status == '1' ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$review->status == '0' ? 'selected' : ''}}>Inactive</option>

                                        </select>
                                    </div>
                                </div>





                                <div class="form-group row last">
                                    <label class="col-md-3 label-control" for="projectinput9">Message</label>
                                    <div class="col-md-9">
                                        <textarea id="projectinput9" rows="5" class="form-control" disabled name="comment" placeholder="About Project">{{$review->message}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
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


</section>
<!-- // Basic form layout section end -->



@endsection












@section('js')



@endsection