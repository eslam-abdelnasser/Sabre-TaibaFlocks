@extends('admin.layout')
@section('title' ,'View all Groups')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Groups</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Groups</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Group Name</th> 
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($groups))
                            @foreach($groups as $group)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$group->name}}</td>
                               
                                <td>
                                    <a href='{{ url("admin/groups/$group->id/edit") }}' data-toggle="tooltip" title="Edit Group"><i class="icon-edit2"></i></a>

                                    <a  href='{{ url("admin/groups/$group->id/users") }}' data-toggle="tooltip" title="Show all users under this group"><i class="icon-th"></i></a> 
 
  
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="3" class="text-xs-center">
                                     No Groups were found yet
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