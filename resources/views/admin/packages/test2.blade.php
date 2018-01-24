{!! Form::open(['route'=>['packages.update',$package->id],'method'=>'PUT','class'=>'number-tab-steps wizard-notification','role'=>'form','id'=>'fileupload','files'=>true]) !!}
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

        @foreach($package->packageDescription as $packageDescription)
            <div role="tabpanel" class="tab-pane {{$loop->first ? 'active' : ''}}" id="{{$packageDescription->language->label}}" aria-expanded="true" aria-labelledby="base-{{$packageDescription->language->label}}">
                <div class="form-body">

                    <div class="form-group">
                        <label for="timesheetinput1">Package Name ({{$packageDescription->language->name}})</label>
                        <div class="position-relative">
                            <input type="text" id="name_{{$packageDescription->language->label}}" value="{{$packageDescription->name}}" class="form-control" placeholder="Package name" name="name_{{$packageDescription->language->label}}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="timesheetinput1">Slug ({{$language->name}})</label>
                        <div class="position-relative">
                            <input type="text" id="slug_{{$language->label}}" value="{{$packageDescription->slug}}" class="form-control" placeholder="Slug" name="slug_{{$packageDescription->language->label}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="timesheetinput1">Destination  ({{$packageDescription->language->name}})</label>
                        <div class="position-relative">
                            <input type="text" id="name_{{$packageDescription->language->label}}" value="{{$packageDescription->destination}}" class="form-control" placeholder="Destination name" name="destination_{{$packageDescription->language->label}}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="timesheetinput7">Description ({{$packageDescription->language->name }})</label>
                        <div class="position-relative has-icon-left">
                            <textarea id="timesheetinput7" rows="5" class="form-control"  name="description_{{$packageDescription->language->label}}" placeholder="Description">{{$packageDescription->description}}</textarea>
                            <div class="form-control-position">
                                <i class="icon-file2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="timesheetinput1">Meta title ({{$packageDescription->language->name}})</label>
                        <div class="position-relative">
                            <input type="text" id="timesheetinput1" value="{{$packageDescription->meta_title}}" class="form-control" placeholder="Meta title" name="meta_title_{{$packageDescription->language->label}}">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="timesheetinput1">Meta description ({{$packageDescription->language->name}})</label>
                        <div class="position-relative">
                            <input type="text" id="timesheetinput1" value="{{$packageDescription->meta_description}}" class="form-control" placeholder="Meta Description" name="meta_description_{{$packageDescription->language->label}}">

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
                    @if($package->status == '1')
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    @else
                        <option value="1" >Active</option>
                        <option value="0" selected>Inactive</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>Points</label>
                <div class="input-group input-group-lg">
                    <input type="text" class="touchspin input-lg" value="{{$package->points}}" name="points">
                </div>

            </div>
            <div class="form-group">
                <label for="timesheetinput1">Price</label>
                <div class="position-relative">
                    <input type="text" id="price" value="{{$package->price}}" class="form-control" placeholder="Price" name="price">

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
                    <input type="text" class="touchspin-color" name="max_number" value="{{$package->max_number}}" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Minmum travellers number</label>
                <div class="input-group">
                    <input type="text" class="touchspin-color" name="min_number" value="{{$package->min_number}}" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="issueinput5">Select Category</label>
                <select id="issueinput5" name="category" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" required>
                    <option disabled> Select category</option>
                    @foreach($categories as $category)
                        @foreach($package->category->categoryDescription as $description)
                            @if($description->language->label == 'en')
                                @if($package->category->id == $category->id)
                                    <option value="{{$category->id }}" selected>{{$description->name}}</option>
                                @else
                                    <option value="{{$category->id }}" >{{$description->name}}</option>
                                @endif

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
                    <input type='text' class="form-control"  id="datetimepicker4" value="{{date('m/d/y H:i:s a', strtotime( $package->cancellation_date))}}" name="cancellation_date"/>
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
                    @php $reservation =  array( date('m/d/y H:i:s a', strtotime( $package->reservation_start_date)), date('m/d/y H:i:s a', strtotime( $package->reservation_end_date)));
                                                                            $finalReservation= implode(' - ' , $reservation);
                    @endphp
                    <input type='text' class="form-control datetime"  value="{{$finalReservation}}" name="reservation" />
                    <span class="input-group-addon">
                                                                            <span class="icon-calendar-o"></span>
                                                                        </span>
                </div>
            </div>


            <div class="form-group">
                <label>Journey start & end Date - Time :</label>
                <div class='input-group'>
                    @php $journey =  array( date('m/d/y H:i:s a', strtotime( $package->journey_start_date)), date('m/d/y H:i:s a', strtotime( $package->journey_end_date)));
                                                                            $finalJourney= implode(' - ' , $journey);
                    @endphp
                    <input type='text' class="form-control datetime" value="{{$finalJourney}}"  name="journey"/>
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
                    @php  foreach($package->features as $packageFeature)
                                                                            {

                                                                            $packageFeatureIds[] = $packageFeature->id;

                                                                            }

                    @endphp
                    @foreach($features as $feature)

                        <label class="inline custom-control custom-checkbox block">



                            <input type="checkbox" class="custom-control-input" {{in_array($feature->id,$packageFeatureIds) ? 'checked' : ''}} name="features[]" value="{{$feature->id}}">


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
                    @php  foreach($package->options as $packageOption)
                                                                            {

                                                                            $packageOptionIds[] = $packageOption->id;

                                                                            }

                    @endphp
                    @foreach($options as $option)
                        <label class="inline custom-control custom-checkbox block">

                            <input type="checkbox" class="custom-control-input"  {{in_array($option->id,$packageOptionIds) ? 'checked' : ''}} name="options[]" value="{{$option->id}}">

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