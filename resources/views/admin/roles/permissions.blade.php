@extends('admin.layout')
@section('title' ,"View all Permission under role : $role->name")

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Permissions under role : {{ $role->name }}</h4>
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
                            @php $permissions = $role->perms()->get() ; @endphp
                            @if(count($permissions))
                            @foreach($permissions as $permission)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->display_name}}</td>
                                <td>{{ str_limit($permission->description , 50) }}</td>
                                <td>
                                    <a href='{{ url("admin/roles/$role->id/permissions/$permission->id/edit") }}' data-toggle="tooltip" title="Edit Permission"><i class="icon-edit2"></i></a> 

                                    
 
                                  {{--   {!! Form::open(['route'=>['roles.destroy',$role->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}
                                    <button type="submit" class="btn mr-1 mb-1 btn-danger btn-square btn-sm">Delete</button>
                                    {!! Form::close() !!} --}}
                                </td>
                            </tr>
                             @endforeach
                             @else

                            <tr>

                                <td colspan="5" class="text-xs-center">
                                     No Permissions  Related to this role found
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