@extends('admin.layout')
@section('title' ,'View all Tickets')

@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tickets</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Tickets </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                               
                                <th>Status</th>
                                <th>Creation date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tickets))
                            @foreach($tickets as $ticket)

                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$ticket->name}}</td>
                                <td>{{$ticket->email}}</td>
                                {{-- <td>{!! $ticket->user->username !!}</td> --}}
                                <td>{!! $ticket->status == 0 ? 'opened':'closed' !!}</td>
                                <td>{{ date('Y-m-d' , strtotime($ticket->created_at)) }}</td>
                                <td>
                                     <a href='{{ url("admin/tickets/$ticket->id") }}' data-toggle="tooltip" title="Show Ticket Messege"><i class="icon-th"></i></a>

                                    <a  href='{{ url("admin/tickets/$ticket->id/edit") }}' data-toggle="tooltip" title="Edit Ticket Status"><i class="icon-edit2"></i></a> 
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