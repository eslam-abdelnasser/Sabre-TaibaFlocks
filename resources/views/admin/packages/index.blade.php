@extends('admin.layout')
@section('title' ,'View all packages')
@section('css')
<style>
    .table-responsive{
        overflow-x : visible ;
    }

</style>
@endsection
@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Packages</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Packages <code>name</code> , <code>status</code> , <code class="highlighter-rouge">image</code>and  <code>Actions</code>.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>

                                <th>Package image</th>
                                <th>Status</th>

                                <th>Actions</th>
                                <th> Images</th>
                                <th> Reviews </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($packages))
                                @foreach($packages as $package)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            @foreach($package->packageDescription as $description)
                                                <div><a href="{{route('packages.edit',['id' => $package->id])}}">{{$description->name}}</a></div>
                                            @endforeach
                                        </td>
                                        <td><img src="{{asset('uploads/packages/'.$package->image_url)}}"  width="50"/></td>
                                        <td>
                                            {!!  $package->status == '1' ? '<button type="button" class="btn btn-success btn-block">Active</button>' : '<button type="button" class="btn btn-danger btn-block">Inactive</button>' !!}

                                        </td>


                                        <td>
                                            <button type="button" class="btn mr-1 mb-1 btn-cyan btn-square btn-sm" onclick="Javascript:window.location.href ='{{route('packages.edit',['id'=> $package->id])}}';">Edit</button>
                                            {!! Form::open(['route'=>['packages.destroy',$package->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}
                                            <button type="submit" class="btn mr-1 mb-1 btn-danger btn-square btn-sm">Delete</button>
                                            {!! Form::close() !!}



                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info dropdown-toggle mr-1 mb-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('create.package.images',['id'=> $package->id ])}}">Add images</a>
                                                    <a class="dropdown-item" href="{{route('package.images',['id'=> $package->id ])}}">View all images</a>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a  href='{{route('show.reviews',['id'=> $package->id ])}}' data-toggle="tooltip" title="Show all Reviews"><i class="icon-th"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else

                                <tr>

                                    <td colspan="8" style="text-align: center">
                                        No packages  Added
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


@section('js')


@endsection