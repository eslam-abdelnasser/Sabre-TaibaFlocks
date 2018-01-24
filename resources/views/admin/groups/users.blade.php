@extends('admin.layout')
@section('title' ," view users under Group : $group->name ")

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Users</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">view users under Group : <code>{{$group->name}}</code> </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Points</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users))
                            @foreach($users as $user)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->points}}</td>
                                <td>
                                    <a href='{{ url("admin/users/$user->id/edit") }}' data-toggle="tooltip" title="Edit User"><i class="icon-edit2"></i></a>

                                    
 
  
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="7" class="text-xs-center">
                                     No  users found under this group till now
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