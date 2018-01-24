









@extends('admin.layout')
@section('title' ,'Update general website settings')

@section('content')

<div class="row match-heigh">
    <div class="col-md-12 col-sm-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-icons">Update general website settings</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <div class="card-text">
                        <p>Here you can view and update general settings for your website </p>
                    </div>

                     {!! Form::model( $setting , [ 'route'=>['admin.general.setting.update' , $setting->id] , 'method'=>'POST' , 'id'=>'update_general']) !!}
                            {{ method_field('put') }}
                         <div class="form-body">
                                                 
                                                
                                                 
                                                <div class="form-group">
                                                    <label>Site URL</label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-link  font-green"></i>
                                                        <input  name="site_url" type="text" value="{{ $setting->site_url }}"   class="form-control {{ $errors->has('site_url') ? ' has-error' : '' }}" placeholder=" site url"> 
                                                    </div>

                                                      @if ($errors->has('site_url'))
                                                          <span class="help-block">
                                                            <strong>{{ $errors->first('site_url') }}</strong>
                                                          </span>
                                                      @endif

                                                </div>
                             <div class="form-group">
                                 <label>Saudi Riyal per point (SAR/point)</label>
                                 <div class="input-icon right">
                                     <i class="fa fa-link  font-green"></i>
                                     <input  name="points" type="text" value="{{ $setting->points }}"   class="form-control {{ $errors->has('points') ? ' has-error' : '' }}" placeholder="SAR/point">
                                 </div>

                                 @if ($errors->has('points'))
                                     <span class="help-block">
                                                            <strong>{{ $errors->first('points') }}</strong>
                                                          </span>
                                 @endif

                             </div>

                             <div class="form-group">
                                 <label>Points per review (points/review)</label>
                                 <div class="input-icon right">
                                     <i class="fa fa-link  font-green"></i>
                                     <input  name="review_points" type="text" value="{{ $setting->review_points }}"   class="form-control {{ $errors->has('review_points') ? ' has-error' : '' }}" placeholder="points/Review">
                                 </div>

                                 @if ($errors->has('review_points'))
                                     <span class="help-block">
                                                            <strong>{{ $errors->first('review_points') }}</strong>
                                                          </span>
                                 @endif

                             </div>
                             <div class="form-group">
                                 <label>Address arabic</label>
                                 <div class="input-icon right">
                                     <i class="fa fa-link  font-green"></i>
                                     <input  name="address_arabic" type="text" value="{{ $setting->address_arabic }}"   class="form-control {{ $errors->has('address_arabic') ? ' has-error' : '' }}" placeholder="Address Arabic">
                                 </div>

                                 @if ($errors->has('address_arabic'))
                                     <span class="help-block">
                                                            <strong>{{ $errors->first('address_arabic') }}</strong>
                                                          </span>
                                 @endif

                             </div>
                             <div class="form-group">
                                 <label>Address english</label>
                                 <div class="input-icon right">
                                     <i class="fa fa-link  font-green"></i>
                                     <input  name="address_english" type="text" value="{{ $setting->address_english }}"   class="form-control {{ $errors->has('address_english') ? ' has-error' : '' }}" placeholder="Address English">
                                 </div>

                                 @if ($errors->has('address_english'))
                                     <span class="help-block">
                                                            <strong>{{ $errors->first('address_english') }}</strong>
                                                          </span>
                                 @endif

                             </div>
                             <div class="form-group">
                                 <label>Phone</label>
                                 <div class="input-icon right">
                                     <i class="fa fa-link  font-green"></i>
                                     <input  name="phone" type="text" value="{{ $setting->phone }}"   class="form-control {{ $errors->has('phone') ? ' has-error' : '' }}" placeholder="Phone">
                                 </div>

                                 @if ($errors->has('phone'))
                                     <span class="help-block">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                          </span>
                                 @endif

                             </div>
                                                <div class="form-group">
                                                    <label> Site Email</label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-envelope  font-green"></i>
                                                        <input type="text" name="site_email" value="{{ $setting->site_email }}"  class="form-control {{ $errors->has('site_email') ? ' has-error' : '' }}" placeholder="site email"> 
                                                        </div>
                                                        @if ($errors->has('site_email'))
                                                          <span class="help-block">
                                                            <strong>{{ $errors->first('site_email') }}</strong>
                                                          </span>
                                                      @endif
                                                     
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Description</label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-tasks  font-green"></i>
                                                        <textarea name="site_description" id="site_description" cols="30" rows="10" placeholder=" site description" class="form-control {{ $errors->has('site_description') ? ' has-error' : '' }}"> {{ $setting->site_description }} </textarea>
                                                     </div> 
                                                      @if ($errors->has('site_description'))
                                                          <span class="help-block">
                                                            <strong>{{ $errors->first('site_description') }}</strong>
                                                          </span>
                                                      @endif 
                                                </div>
                                                <div class="form-group">
                                                    <label>Site Keywords</label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-tasks   font-green"></i>
                                                       <textarea name="site_keywords" id="site_keywords" cols="30" rows="10" placeholder="site keywords" class="form-control">{{ $setting->site_keywords }}</textarea>
                                                       </div>
                                                </div>
                                                <div class="form-group">
                                                    <label> Google Analytics Id (seo) </label>
                                                     <div class="input-icon right">
                                                        <i class="fa fa-code font-green"></i>
                                                        <input  name="site_google_analytics_id" value="{{ $setting->site_google_analytics_id }}" type="text"   class="form-control" placeholder="google id"> </div>
                                                 
                                                
                                                </div>
                                                 <div class="form-group">
                                                    <label>Google Indexing Code (seo) </label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-code  font-green"></i>
                                                        <textarea name="google_javascript_code" id="google_javascript_code" cols="30" rows="10" placeholder="google indexing code" class="form-control"> {{ $setting->google_javascript_code }} </textarea>
                                                     </div>  
                                                </div>
                                            
                                                 <div class="form-actions right">
                                                    <button type="reset" class="btn btn-warning mr-1">
                                                        <i class="icon-cross2"></i> Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="icon-check2"></i> Update General Settings
                                                    </button>

                                                         <div id="messages"></div>          
                                                </div>

                                               
                                            
                                        {!! Form::close() !!}
                    

                </div>
            </div>
        </div>
    </div>

</div>


@endsection