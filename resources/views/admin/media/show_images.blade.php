@extends('admin.layout')

@section('title' , "View Gallery Images")


@section('css')
	
	  

@endsection

@section('content')
						<div class="contianer">
							<div class="row">

								

									 @if(count($images))

									@foreach($images as $image)


										 <div class="col-md-3">
	                                            <a href='{{ asset("uploads/gallery_images/thumbs-500-137/$image->image_url") }}' class="cbp-lightbox"><img  src='{{ asset("uploads/gallery_images/thumbs-500-137/$image->image_url") }}' alt=""> </a>
	                                        
	                                      

														{!! Form::open(['route'=>['admin.gallery_image.destroy' , $image->id] , 'method'=>'POST' , 'id'=>'delete_image']) !!}
														{{ method_field('delete') }}
	                                                    <button type="submit"  class="btn btn-primary btn-sm" rel="nofollow">Delete</button>

														{!! Form::close() !!}
	                                                
	                                    {{-- <div class="cbp-l-grid-projects-title uppercase text-center">{{ $image->image_url }}</div> --}}

	                                 </div>


									@endforeach
	                            @endif


								 
							
							</div>

							</div>

	                           
	                
                   

@endsection 


@section('js')
	

 

@endsection