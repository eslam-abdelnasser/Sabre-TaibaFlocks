@extends('admin.layout')
@section('title' ,'View all website users')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">website Users</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All website Users </p>
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
                                <th>Groups Related to</th>

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
                                    @if(count($user->group))
                                    @foreach($user->group as $group)
                                        <code>{{ $group->name }}</code>
                                        <br>
                                    @endforeach
                                    @else
                                        not related to any group
                                    @endif
                                </td>
                                <td>
                                    <a href='{{ url("admin/users/$user->id/edit") }}' data-toggle="tooltip" title="Edit User"><i class="icon-edit2"></i></a>

                                     <a  href='{{ url("admin/users/$user->id/group") }}' data-toggle="tooltip" title="Attach To Group"><i class="icon-plus3"></i></a> 

                                    {{-- <a href='{{ url("admin/users/$user->id/edit") }}' data-toggle="tooltip" title="Edit User"><i class="icon-edit2"></i></a>  --}}
 
  
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="7" class="text-xs-center">
                                     No website users found till now
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