 
@extends('admin.layout')
@section('title' ,'Create new Gallery')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new Gallery</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can add new gallery </p>
                    </div>

                    {!! Form::open( ['route'=>['admin.gallery.post'],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="timesheetinput1"> Name</label>
                                <div class="position-relative">
                                   <input  name="title" type="text"   class="form-control" placeholder="album name"> </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="timesheetinput1">Status</label>
                                <div class="position-relative">
                                    <select name="status" class="form-control">
                                        <option value="" selected disabled >select status</option>                 
                                        <option value="0" name="st" >draft</option>
                                        <option value="1" name="st" > published</option>
                                    </select>

                                </div>
                            </div>

                            

                              <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Add new Gallery
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