{!! Form::open(['route'=>['packages.store'],'method'=>'POST','class'=>'number-tab-steps wizard-notification','role'=>'form','id'=>'fileupload','files'=>true]) !!}
<!-- Step 1 -->
<h6>Step 1</h6>
<fieldset>

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
                            <textarea id="timesheetinput7" rows="5" class="form-control"  name="description_{{$language->label}}" placeholder="Description">{{old('description_'.$language->label)}}</textarea>
                            <div class="form-control-position">
                                <i class="icon-file2"></i>
                            </div>
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
</fieldset>

<!-- Step 2 -->
<h6>Step 2</h6>
<fieldset>
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
</fieldset>

<!-- Step 3 -->
<h6>Step 3</h6>
<fieldset>
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
</fieldset>

<!-- Step 4 -->
<h6>Step 4</h6>
<fieldset>
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
</fieldset>
{!! Form::close() !!}