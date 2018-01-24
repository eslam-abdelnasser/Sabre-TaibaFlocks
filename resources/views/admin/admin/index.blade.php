@extends('admin.layout')
@section('title' ,'View bank Transactions')

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
                                <th> Name</th>
                                <th>User email</th>
                                <th>Card Number</th>
                                <th>Fort id</th>
                                <th>Amount</th>
                                {{--<th>Add account number</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($payfort))
                                @foreach($payfort as $description)

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>

                                         <td>{{$description->customer_name}}</td>

                                        <td>{{ $description->customer_email }}</td>
                                        <td>{{ $description->card_number}}</td>
                                        <td>{{ $description->fort_id}}</td>
                                        <td>{{ $description->amount}} SAR</td>

                                    </tr>
                                @endforeach
                            @else

                                <tr>

                                    <td colspan="5" class="text-xs-center">
                                        No Transactions
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