@extends('layouts.app')

@section('content')

<section class="content col-md-12">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
	
	<div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"> Form {{$title }} </h3>
        </div>
        <form action="{{ route('booking.process') }}" method="post">
            {{ csrf_field() }}

            <div class="card-body">
            	<table class="table">
            		<thead>
            			<tr>
            				<td><b>Name</b> </td>
            				<td>: </td>
            				<td>{{ $client->name }}</td>
                            <input type="hidden" name="client_id" value="{{$client->client_id}}" required>
            			</tr>
        			</thead>
                    <tr>
                        <th>Car Name </th>
                        <td>: </td>
                        <td>{{ $car->car_name }}</td>
                        <input type="hidden" name="car_id" value="{{ $car->car_id }}" required>
                    </tr>
        			<tr>
        				<th>Booking Code </th>
        				<td>: </td>
        				<td>{{ $data['booking_code'] }}</td>
                        <input type="hidden" name="booking_code" value="{{$data['booking_code']}}" required>
        			</tr>
        			<tr>
        				<th>Order Date</th>
        				<td> : </td>
        				<td>{{ $data['order_date'] }}</td>
                        <input type="hidden" name="order_date" value="{{$data['order_date']}}" required>
        			</tr>
        			<tr>
        				<th>Order Duration</th>
        				<td> : </td>
        				<td>{{ $data['duration'] }} Days</td>
                        <input type="hidden" name="duration" value="{{ $data['duration'] }}" required>
        			</tr>
        			<tr>
        				<th>Return Date</th>
        				<td> : </td>
        				<td>{{ $return_date }}</td>
                        <input type="hidden" name="return_date_supposed" value="{{ $return_date }}" required>
        			</tr>
        			<tr>
        				<th>Price a day</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($car->price) }}</td>
        			</tr>
        			<tr>
        				<th>Total Price</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($total_price) }}</td>
                        <input type="hidden" name="price" value="{{ $total_price }}" required>
        			</tr>
        			<tr>
        				<th>Dp Minimum</th>
        				<td> : </td>
        				<td>Rp. {{ number_format($dp) }}</td>
                        <input type="hidden" name="employees_id" value="{{ Auth::user()->id }}" required>
        			</tr>
                    <tr>
                        <td colspan="3"><button href="#" data-toggle="modal" data-target="#paymentModal" type="button"> Book Now </button></td>
                    </tr>
            	</table>
            </div>
            <!-- payment MODALS  -->
            @include('booking.form-payment')
        </form>
    </div>

    

</section>

<!-- Modal -->
@endsection