@extends('admin.layout')
@section('title' ,'View all Backend users')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Backend Users</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Backend Users </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($admins))
                            @foreach($admins as $admin)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{!! $admin->roles->first() == null ? 'has no Role': $admin->roles[0]['name'] !!}</td>
                                <td>
                                    <a href='{{ url("admin/admin-users/$admin->id/edit") }}' data-toggle="tooltip" title="Edit Role"><i class="icon-edit2"></i></a> 

                             

                                   
  
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="5" class="text-xs-center">
                                     No Backend users found
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