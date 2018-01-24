@extends('admin.layout')
@section('title' ,'View bank transfer')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bank Transfers</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Bank transfers </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>User email</th>
                                <th>Amount</th>
                                <th>Add account number</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($package_user))
                                @foreach($package_user as $package)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        @foreach($package->packages->packageDescription as $description)
                                            @if($description->language->label == 'en')
                                        <td>{{$description->name}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $package->users->email }}</td>
                                        <td>{{ $package->amount}}$</td>
                                        {!! Form::model( $package ,  ['route'=>['bank-transfer.post' , $package->id],'method'=>'POST']) !!}


                                        <td><input type="text" name="account_number"></td>
                                        <td> <button class="btn-primary" type="submit"> Submit</button></td>
                                        {!! Form::close() !!}
                                        {{--<td>--}}
                                            {{--<a href='{{ url("admin/roles/$role->id/edit") }}' data-toggle="tooltip" title="Edit Role"><i class="icon-edit2"></i></a>--}}

                                            {{--<a  href='{{ url("admin/roles/$role->id/permissions") }}' data-toggle="tooltip" title="Show all permissions"><i class="icon-th"></i></a>--}}

                                            {{--<a  href='{{ url("admin/roles/$role->id/permissions/add") }}' data-toggle="tooltip" title="Add permission(s)"><i class="icon-plus3"></i></a>--}}

                                               {{--{!! Form::open(['route'=>['roles.destroy',$role->id],'method'=>'DELETE','style'=>'display:inline-block','role'=>'form']) !!}--}}
                                              {{--<button type="submit" class="btn mr-1 mb-1 btn-danger btn-square btn-sm">Delete</button>--}}
                                              {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}
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