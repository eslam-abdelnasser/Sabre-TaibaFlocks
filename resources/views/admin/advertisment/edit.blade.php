
@extends('admin.layout')
@section('title' ,'Edit Advertisment')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Edit Advertisment</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can edit advertisment </p>
                    </div>

                    {!! Form::model($advertisment ,  [ 'url'=>['admin/advertisment/update' , $advertisment->id ] , 'method'=>'POST' , 'id'=>'update_advertisment']) !!}
                      {{ method_field('put') }}

                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1"> Area name</label>
                                <div class="position-relative">
                                   <input  name="title" type="text" value="{{ $advertisment->title }}"    class="form-control  " placeholder="area name"> 

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Gallery</label>
                                <div class="position-relative">
                                    <select class="form-control " id="advertisment_gallery_id" name="gallery">
                                      
                                       @if(count($galleries))
                                          
                                          @foreach($galleries as $gallery)
                                                
                                              <option value="{{ $gallery->id }}" {!! $advertisment->gallery_id == $gallery->id ? 'selected' :'' !!}  >{{ $gallery->title  }}</option>

                                          @endforeach
                                       @endif
                                  </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Url </label>
                                <div class="position-relative">
                                   <input type="text" id="timesheetinput1" value="{{ $advertisment->url }}"   class="form-control" placeholder="url" name="url">

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Position</label>
                                <div class="position-relative">
                                    <select class="form-control {{ $errors->has('advertisment_position') ? ' has-error' : '' }}" id="advertisment_position" name="advertisment_position">
                                      
                                        <option value="{!! $position == 1 ? 'first':'' !!}" {!! $position == 1 ? 'selected' :'' !!} {!! $position != 1 ? 'disabled':'' !!} >First Area</option>

                                        <option value="{!! $position == 2 ? 'second':'' !!}" {!! $position == 2 ? 'selected' :'' !!} {!! $position != 2 ? 'disabled':'' !!} >Second Area</option>

                                        <option value="{!! $position == 3 ? 'third':'' !!}" {!! $position == 3 ? 'selected':'' !!} {!! $position != 3 ? 'disabled':'' !!} >Third Area</option>

                                        <option value="{!! $position == 4 ? 'fourth':'' !!}" {!! $position == 4 ? 'selected':'' !!} {!! $position != 4 ? 'disabled':'' !!} >Fourth Area</option>

                                  </select>

                                </div>
                            </div>



                            <div class="form-group">
                                <label for="timesheetinput1">Status</label>
                                <div class="position-relative">
                                    <select name="status" class="form-control" >
                                         
                                        <option value="1" {!! $advertisment->status == 1 ? 'selected':'' !!}>Active</option>
                                        <option value="0" {!! $advertisment->status == 0 ? 'selected':'' !!}>Not Active</option>
                                    </select>

                                </div>
                            </div>
 
 

                             

                        </div>

                        <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Add new Advertisment
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>


@endsection