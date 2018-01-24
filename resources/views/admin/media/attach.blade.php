@extends('admin.layout')
@section('title' ,'Attaching images to this gallery')
 
@section('content')


     <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">Attaching images </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">here you can attach  images to this gallery </p>

                         {!! Form::open([ 'route'=>['admin.gallery.attach_images'] , 'method'=>'POST' , 'id'=>'add_files' , 'class'=>'dropzone dropzone-file-area' , 'files'=>true]) !!}
                            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                            
                        {!! Form::close() !!}
                        <br>

                         <div class="form-actions right">
                        <button class="btn btn-primary"   id="act-on-upload">upload</button>
                        </div>

                    </div> 

                       
                                              

                    </div>
                </div>
            </div>
        </div>
<!-- Bordered striped end -->

                        <input type="hidden" id="go_back" value="{{ route('admin.media') }}">

@endsection 
@section('js')
  

 {{-- {{ Html::script('admin-panel/assets/global/plugins/dropzone/dropzone.min.js')}} --}}

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