@extends('admin.layout')
@section('title' ,'View all Permissions')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Permissions</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Permissions </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Permission Name</th>
                                <th>Permission Display name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($permissions))
                            @foreach($permissions as $permission)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>{{ str_limit($permission->description , 50) }}</td>
                                <td>
                                    <a href='{{ url("admin/permissions/$permission->id/edit") }}' data-toggle="tooltip" title="Edit permission"><i class="icon-edit2"></i></a> 

                                    
                                  
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="5" class="text-xs-center">
                                    No permissions found
                                </td>

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