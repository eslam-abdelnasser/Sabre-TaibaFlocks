 


@extends('admin.layout')

@section('title' ,'View all Social Links')


@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Social Media Links</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Social Media </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                {{-- <th>Icon</th> --}}
                                <th>Status</th>
                                <th>Date Added</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                           @if(count($social)>0)
                                @foreach($social as $link)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $link->name }} </td>
                                        {{-- <td><a href="{{ $link->url }}" class='fa fa-{{ $link->icon }}' target="_blank"></a> </td> --}}
                                        

                                        <td>{!! $link->is_active == 1 ? '<span class="label label-sm label-success"> Active</span>' : '<span class="label label-sm label-danger">Not active</span>' !!} </td>
                                        <td> {{ date('d - m - Y' , strtotime($link->created_at) ) }} </td>
                                        <td> 
                                         
                                            <a href="{{ route('social.edit' , $link->id) }}" data-toggle="tooltip" title="" data-original-title="Edit Social Link" class="btn btn-outline btn-circle btn-sm purple">
                                                <i class="icon-edit2"></i>
                                        </td>
                                        
                                            
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-xs-center">We can't find any social media link yet</td>
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