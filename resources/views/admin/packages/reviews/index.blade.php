@extends('admin.layout')
@section('title' ,'View all Reviews')
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
                    <h4 class="card-title">Reviews</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Packages <code>email</code> , <code>status</code>and  <code>Actions</code>.</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>

                                <th>Status</th>

                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(count($reviews))
                                @foreach($reviews as $review)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>

                                                <div>{{$review->email}}</div>

                                        </td>
                                        <td>
                                            {!!  $review->status == '1' ? '<button type="button" class="btn btn-success btn-block">Active</button>' : '<button type="button" class="btn btn-danger btn-block">Inactive</button>' !!}

                                        </td>


                                        <td>
                                            <button type="button" class="btn mr-1 mb-1 btn-cyan btn-square btn-sm" onclick="Javascript:window.location.href ='{{route('edit.review',['id'=> $review->id])}}';">Edit</button>




                                        </td>


                                    </tr>
                                @endforeach
                            @else

                                <tr>

                                    <td colspan="8" style="text-align: center">
                                        No Review for this package  Added
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