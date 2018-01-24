@extends('admin.layout')
@section('title' ,"Create new permission under role : $role->name")

{{-- @section('css')
  
    {{Html::style('admin-panel/assets/css/plugins/forms/checkboxes-radios.css')}}
@endsection --}}

@section('content')
 
<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Add new permission(s) to role : <code>{{ $role->name }}</code></h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can attach new permission(s)  to role </p>
                    </div>

                    {!! Form::open(['url'=>["admin/roles/$role->id/permissions"],'method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">
 

                   <div class="card-block">

                         <div class="row   ">
                             <div class="col-md-12 col-sm-12">
                                
                                 <input type="checkbox" id="check_all" onclick="toggle(this);" />
                                 <label for="check_all"><b>Check All</b></label>
                             </div>
                        </div>
                        <br>
                        <br>

                        <div class="row  ">
                          <div class="col-md-12 col-sm-12">
                            @if(count($permissions))
                                @foreach($permissions as $permission)
                                    <div class="col-md-3">
                                    <fieldset>
                                      <input type="checkbox" name="{{ $permission->id }}" id="{{ $permission->id }}">
                                      <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                    </fieldset>
                                    </div>
                                @endforeach
                            @endif 
                          </div>
                          
                          
                        </div>
                      </div>
 

                             

                        </div>

                        <div class="form-actions right">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Add Permission(s)
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
     
            function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
 
    </script>
@endsection
