@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
       
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order Date</th>
                        <th>Booking Code</th>
                        <th>Client Name</th>
                        <th>Car</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking_data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->order_date }}</td>
                        <td>{{ $row->booking_code }}</td>
                        <td>{{ $row->name }}</td>
                       	<td>{{ $row->car_name }}</td>
                       	<td><a href="{{ route('returns.information', ['booking_code' => $row->booking_code ]) }}" class="btn btn-primary btn-sm">Process Return</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section> 

@endsection