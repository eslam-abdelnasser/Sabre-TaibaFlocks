 


 


@extends('admin.layout')

@section('title' ,'View all Galleries')


@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">Albums </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Albums </p>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Album Name</th>
                                {{-- <th>Icon</th> --}}
                                <th>Status</th>
                                <th>Date Added</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                             
                             @if(count($media)>0)
												@foreach($media as $gallery)
	                                                <tr>
	                                                    <td>{{ $loop->iteration }}</td>
	                                                    <td>{{ $gallery->title }} </td>
                                                        <td>{!! $gallery->status == 1 ? '<span class="label label-sm label-success">published</span>' : '<span class="label label-sm label-danger">draft</span>' !!}  </td>
	                                                   

                                                       {{--  <td>{!! $gallery->related_to_page == 1 ? '<span class="label label-sm label-success">نعم</span>' : '<span class="label label-sm label-warning">لا</span>' !!}  </td> --}}

                                                        <td>{{ date('d - m - Y' , strtotime($gallery->created_at) ) }} </td>
	                                                    
	                                                    <td> 
															
                                                             
                                                             <a href="{{ route('admin.gallery.attach' , $gallery->id) }}" 
                                                                     class="btn btn-outline btn-circle btn-sm purple " 
                                                                     data-toggle="tooltip" data-original-title="Add Images"><i class="icon-plus3"></i></a>
                                                             
                                                                <a href="{{ route('admin.gallery.show_images' , $gallery->id ) }}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" data-original-title="Show Images">
                                                                <i class="icon-th"></i> </a>
 
                                                                <a href="{{ route('admin.gallery.edit' , $gallery->id) }}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="tooltip" data-original-title="Edit Gallery">
                                                                <i class="icon-edit2"></i> </a>
	                                                    </td>
	                                                    
	                                                     
	                                                </tr>
	                                            @endforeach
                                            @else
												<tr>
													<td colspan="6" class='text-xs-center'>Sorry , we can't find any album</td>
												</tr>
                                            @endif

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->


@endsection