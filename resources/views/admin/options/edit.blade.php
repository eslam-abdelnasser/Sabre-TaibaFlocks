@extends('admin.layout')
@section('title' ,'Edit Category')

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Option</h4>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <p>Edit at  <code>these fields</code> to update Feature . </p>

                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                            @foreach($languages as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {!! Form::open(['route'=>['options.update',$option->id],'method'=>'PUT','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="tab-content px-1 pt-1">

                            @foreach($option->optionDescription as $optionDescription)
                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$optionDescription->language->label}}" aria-expanded="true" aria-labelledby="base-{{$optionDescription->language->label}}">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="timesheetinput1">Feature Name ({{$optionDescription->language->name}})</label>
                                            <div class="position-relative">
                                                <input type="text" id="timesheetinput1" value="{{$optionDescription->name}}" class="form-control" placeholder="Option name" name="name_{{$optionDescription->language->label}}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="timesheetinput7">Description ({{$optionDescription->language->name }})</label>
                                            <div class="position-relative has-icon-left">
                                                <textarea id="timesheetinput7" rows="5" class="form-control"  name="description_{{$optionDescription->language->label}}" placeholder="Description">{{$optionDescription->description}}</textarea>
                                                <div class="form-control-position">
                                                    <i class="icon-file2"></i>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                            @endforeach

                                <div class="form-group">
                                    <label for="timesheetinput1">Price</label>
                                    <div class="position-relative">
                                        <input type="number" id="timesheetinput1" value="{{$option->price}}" class="form-control" placeholder="price" name="price">

                                    </div>
                                </div>

                            <div class="form-group">
                                <label for="issueinput5">Status</label>
                                <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                    @if($option->status == '1')
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    @else
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Inactive</option>
                                    @endif
                                </select>
                            </div>




                            <div class="form-actions right">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="icon-cross2"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> Save
                                </button>
                            </div>

                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection