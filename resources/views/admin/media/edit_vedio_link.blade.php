@extends('admin.admin-layout')
@section('page-title' , "تحديث لينك خاص بالبوم")
 
@section('content')




							           <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> 
                            <small>تحديث لينك خاص بالبوم</small>
                        </h1>
                        <!-- END PAGE TITLE-->

          
 
                         <div class="row">

            
                            <div class="col-md-8 col-md-offset-2">
								 <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <i class="icon-settings font-red-sunglo"></i>
                                            <span class="caption-subject bold uppercase">تحديث لينك خاص بالبوم</span>
                                        </div>
                                        
                                    </div>
                                    <div class="portlet-body form">
                                        
                                         
                                              
                                               {!! Form::model( $vedio , [ 'route'=>['admin.gallery_vedio_link.update' , $vedio->id ] , 'method'=>'POST' , 'id'=>'update_vedio']) !!}
                                         
                                            <div class="form-body">
                                                 
                                                
                                                 
                                                <div class="form-group">
                                                    <label>لينك الفيديو</label>
                                                    <div class="input-icon right">
                                                        <i class="fa fa-link  font-green"></i>
                                                        <input  name="vedio_url" type="text"  value="{{ $vedio->vedio_url }}"  class="form-control" placeholder="لينك الفيديو"> </div>
                                                </div>
                                                 
                                                 
                                                
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">تحديث</button>
                                                <button type="button" onclick="window.location.href='{{ url('/admin/media') }}'" class="btn default">تراجع</button>

                                                <div id="messages"></div>
                                            </div>
                                        {!! Form::close() !!}
 
                                    </div>
                                </div>
                                <!-- END SAMPLE FORM PORTLET-->
                            </div>
                        </div>
                        </div>
                        <input type="hidden" id="go_back" value="{{ route('admin.media') }}">

@endsection 
@section('js')
  

 {{ Html::script('admin-panel/assets/global/plugins/dropzone/dropzone.min.js')}}

 <script>
   
  Dropzone.options.addFiles = {
    maxFileSize : 8,
    parallelUploads : 10,
    uploadMultiple: true,
        autoProcessQueue : false,
    addRemoveLinks : true,
    init: function() {
        var submitButton = document.querySelector("#act-on-upload")
        myDropzone = this;
        submitButton.addEventListener("click", function() {
            myDropzone.processQueue(); 
        });

        myDropzone.on("complete", function(file) {
            window.location.href=$('#go_back').val(); 
        });
       
        
    },
};
 </script>

 
@endsection