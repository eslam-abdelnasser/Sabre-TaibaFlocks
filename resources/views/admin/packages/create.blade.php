@extends('admin.layout')
@section('title' ,'Create Package')
@section('css')
    <!-- BEGIN VENDOR CSS-->

    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->

    {{Html::style('admin-panel/assets/css/core/menu/menu-types/vertical-overlay-menu.css')}}
    {{Html::style('admin-panel/assets/vendors/css/pickers/daterange/daterangepicker.css')}}

    {{Html::style('admin-panel/assets/vendors/css/pickers/pickadate/pickadate.css')}}
    {{Html::style('admin-panel/assets/vendors/css/pickers/datetime/bootstrap-datetimepicker.css')}}
    <!-- END Page Level CSS-->
    {{Html::style('admin-panel/assets/css/plugins/forms/checkboxes-radios.css')}}
    {{Html::style('admin-panel/assets/css/plugins/forms/switch.css')}}
    <!-- BEGIN Custom CSS-->
    {{Html::style('admin-panel/assets/css/plugins/forms/wizard.css')}}
    {{Html::style('admin-panel/assets/css/plugins/pickers/daterange/daterange.css')}}
    {{Html::style('admin-panel/assets/vendors/css/forms/icheck/custom.css')}}
    {{Html::style('admin-panel/assets/vendors/css/forms/toggle/bootstrap-switch.min.css')}}
    {{Html::style('admin-panel/assets/vendors/css/forms/toggle/switchery.min.css')}}
    {{Html::style('admin-panel/assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}

@endsection
@section('content')

    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new Package</h4>
                </div>

                    {{-- start section number--}}

                    <!-- Form wizard with number tabs section start -->


                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Fill All Fields <code>create new package successfully</code></h4>
                                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-body collapse in">
                                            <div class="card-block">
                                                {!! Form::open(['route'=>['packages.store'],'method'=>'POST','class'=>'','role'=>'form','id'=>'fileupload','files'=>true]) !!}
                                                <ul class="nav nav-tabs nav-top-border no-hover-bg">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="homeIcon-tab1" data-toggle="tab" href="#homeIcon1" aria-controls="homeIcon1" aria-expanded="true"><i class="icon-grid2"></i> Details</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profileIcon-tab1" data-toggle="tab" href="#profileIcon1" aria-controls="profileIcon1" aria-expanded="false"><i class="icon-head"></i> Price and Info</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" id="aboutIcon1-tab" data-toggle="tab" href="#aboutIcon1" aria-controls="aboutIcon1" aria-expanded="false"><i class="icon-layout"></i> About</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="aboutIcon1-tab" data-toggle="tab" href="#utilization" aria-controls="aboutIcon1" aria-expanded="false"><i class="icon-layout"></i> Utilization</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content px-1 pt-1">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="homeIcon1" aria-labelledby="homeIcon-tab1" aria-expanded="true">
                                                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                                            @foreach($languages as $language)
                                                                <li class="nav-item">
                                                                    <a class="nav-link {{$loop->first ? 'active' : ''}}" id="base-{{$language->label}}" data-toggle="tab" aria-controls="{{$language->label}}" href="#{{$language->label}}" aria-expanded="true">{{$language->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                        <div class="tab-content px-1 pt-1">

                                                            @foreach($languages as $language)
                                                                <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$language->label}}" aria-expanded="true" aria-labelledby="base-{{$language->label}}">
                                                                    <div class="form-body">

                                                                        <div class="form-group">
                                                                            <label for="timesheetinput1">Package Name ({{$language->name}})</label>
                                                                            <div class="position-relative">
                                                                                <input type="text" id="name_{{$language->label}}" value="{{old('name_'.$language->label)}}" class="form-control" placeholder="Package name" name="name_{{$language->label}}">

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="timesheetinput1">Slug ({{$language->name}})</label>
                                                                            <div class="position-relative">
                                                                                <input type="text" id="slug_{{$language->label}}" value="{{old('slug_'.$language->label)}}" class="form-control" placeholder="Slug" name="slug_{{$language->label}}">

                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="timesheetinput1">Destination  ({{$language->name}})</label>
                                                                            <div class="position-relative">
                                                                                <input type="text" id="name_{{$language->label}}" value="{{old('destination_'.$language->label)}}" class="form-control" placeholder="Destination name" name="destination_{{$language->label}}">

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="timesheetinput7">Description ({{$language->name }})</label>
                                                                            <div class="position-relative has-icon-left">
                                                                                <textarea id="timesheetinput7" rows="8" class="form-control my-editor"  name="description_{{$language->label}}" placeholder="Description">{{old('description_'.$language->label)}}</textarea>

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="timesheetinput1">Meta title ({{$language->name}})</label>
                                                                            <div class="position-relative">
                                                                                <input type="text" id="timesheetinput1" value="{{old('meta_title_'.$language->label)}}" class="form-control" placeholder="Meta title" name="meta_title_{{$language->label}}">

                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="timesheetinput1">Meta description ({{$language->name}})</label>
                                                                            <div class="position-relative">
                                                                                <input type="text" id="timesheetinput1" value="{{old('meta_description_'.$language->label)}}" class="form-control" placeholder="Meta Description" name="meta_description_{{$language->label}}">

                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="profileIcon1" role="tabpanel" aria-labelledby="profileIcon-tab1" aria-expanded="false">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="issueinput5">Status</label>
                                                                    <select id="issueinput5" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Inactive</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Points</label>
                                                                    <div class="input-group input-group-lg">
                                                                        <input type="text" class="touchspin input-lg" value="50" name="points">
                                                                    </div>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="timesheetinput1">Price</label>
                                                                    <div class="position-relative">
                                                                        <input type="text" id="price" value="{{old('price')}}" class="form-control" placeholder="Price" name="price">

                                                                    </div>
                                                                </div>
                                                                <div class="form-group"></div>
                                                                <div class="form-group">
                                                                    <label>Upload Cover image</label>
                                                                    <label id="projectinput7" class="file center-block">
                                                                        <input type="file"  name="image_cover">
                                                                        <span class="file-custom"></span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Maximum travellers number</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="touchspin-color" name="max_number" value="55" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Minmum travellers number</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="touchspin-color" name="min_number" value="55" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="issueinput5">Select Category</label>
                                                                    <select id="issueinput5" name="category" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" required>
                                                                        <option disabled> Select category</option>
                                                                        @foreach($categories as $category)
                                                                            @foreach($category->categoryDescription as $description)
                                                                                @if($description->language->label == 'en')
                                                                                    <option value="{{$category->id }}">{{$description->name}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach

                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="issueinput5">Select User group</label>
                                                                    <select id="issueinput5" name="user_group" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                                                        <option disabled> Select user group</option>
                                                                        <option value="3">vip</option>
                                                                        <option value="8">super vip</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="aboutIcon1" role="tabpanel" aria-labelledby="aboutIcon1-tab" aria-expanded="false">
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <div class="form-group">
                                                                    <label>Cancellation Date</label>
                                                                    <div class='input-group date' id='datetimepicker1'>
                                                                        <input type='text' class="form-control"  id="datetimepicker4" name="cancellation_date"/>
                                                                        <span class="input-group-addon">
                                                                            <span class="icon-calendar3"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>


                                                                <br/> <br/> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />

                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Reservation start & end Date - Time :</label>
                                                                    <div class='input-group'>
                                                                        <input type='text' class="form-control datetime"  name="reservation" />
                                                                        <span class="input-group-addon">
                                                                            <span class="icon-calendar-o"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label>Journey start & end Date - Time :</label>
                                                                    <div class='input-group'>
                                                                        <input type='text' class="form-control datetime"  name="journey"/>
                                                                        <span class="input-group-addon">
                                                                            <span class="icon-calendar-o"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="utilization" role="tabpanel" aria-labelledby="aboutIcon1-tab" aria-expanded="false">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Features :</label>
                                                                    <div class="c-inputs-stacked">
                                                                        @foreach($features as $feature)
                                                                            <label class="inline custom-control custom-checkbox block">
                                                                                <input type="checkbox" class="custom-control-input"  name="features[]" value="{{$feature->id}}">
                                                                                <span class="custom-control-indicator"></span>
                                                                                @foreach($feature->featureDescription as $description)
                                                                                    @if($description->language->label  == 'en')
                                                                                        <span class="custom-control-description ml-0">{{$description->name}}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </label>
                                                                        @endforeach

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>options :</label>
                                                                    <div class="c-inputs-stacked">
                                                                        @foreach($options as $option)
                                                                            <label class="inline custom-control custom-checkbox block">
                                                                                <input type="checkbox" class="custom-control-input" name="options[]" value="{{$option->id}}">
                                                                                <span class="custom-control-indicator"></span>
                                                                                @foreach($option->optionDescription as $description)
                                                                                    @if($description->language->label  == 'en')
                                                                                        <span class="custom-control-description ml-0">{{$description->name}}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions right">
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



                        <!-- Form wizard with number tabs section end -->

                        {{-- end section number--}}











            </div>
        </div>
    </div>




@endsection












@section('js')

    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    {{ Html::script('admin-panel/assets/vendors/js/extensions/jquery.steps.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/pickers/daterange/daterangepicker.js')}}

    {{ Html::script('admin-panel/assets/vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/pickers/pickadate/picker.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/pickers/pickadate/picker.date.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/pickers/pickadate/picker.time.js')}}
{{--    {{ Html::script('admin-panel/assets/vendors/js/pickers/pickadate/legacy.js')}}--}}
    {{ Html::script('admin-panel/assets/vendors/js/pickers/daterange/daterangepicker.js')}}



    <!-- END PAGE VENDOR JS-->
    {{ Html::script('admin-panel/assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}
    <!-- BEGIN PAGE LEVEL JS-->
    {{ Html::script('admin-panel/assets/js/scripts/forms/wizard-steps.js')}}
    <!-- END PAGE LEVEL JS-->
    {{ Html::script('admin-panel/assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/forms/toggle/bootstrap-switch.min.js')}}
    {{ Html::script('admin-panel/assets/vendors/js/forms/toggle/switchery.min.js')}}
    {{ Html::script('admin-panel/assets/js/scripts/forms/input-groups.js')}}
    <!-- END PAGE VENDOR JS-->
<script>

    var arr = [];
    for(var i = 0; i < 1000000; i++){
        arr.push(Math.random());
    }



        @foreach($languages as $language)
        $("#name_{{$language->label}}").on('change', function (e) {

            $("#slug_{{$language->label}}").val($("#name_{{$language->label}}").val());
        });

        @endforeach


    // Single Date Range Picker
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

        $('#datetimepicker1').datetimepicker({});
    // file input plugin
        $('#datetimepicker4').datetimepicker();


</script>

@endsection