@extends('admin.layout')
@section('title' ,'View all Roles')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Roles</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Roles </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Role Display name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($roles))
                            @foreach($roles as $role)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$role->name}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>{{ str_limit($role->description , 50) }}</td>
                                <td>
                                    <a href='{{ url("admin/roles/$role->id/edit") }}' data-toggle="tooltip" title="Edit Role"><i class="icon-edit2"></i></a> 

                                    <a  href='{{ url("admin/roles/$role->id/permissions") }}' data-toggle="tooltip" title="Show all permissions"><i class="icon-th"></i></a> 

                                    <a  href='{{ url("admin/roles/$role->id/permissions/add") }}' data-toggle="tooltip" title="Add permission(s)"><i class="icon-plus3"></i></a> 
 
                                  {{--   {!! Form::open(['route'=>['roles.destroy',$role->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}
                                    <button type="submit" class="btn mr-1 mb-1 btn-danger btn-square btn-sm">Delete</button>
                                    {!! Form::close() !!} --}}
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="5" class="text-xs-center">
                                     No Added Added
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