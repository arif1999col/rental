@extends('layouts.app')

@section('content')

<section class="content col-md-6">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

<!-- Modal -->
@include('booking.form-client')

    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('booking.calculate') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>Booking Code</p>
                            <input type="text" class="form-control" required name="booking_code" value=" B-{{ rand() }}" readonly>
                        </div>
                        <div class="form-group">
                            <p>Client Name or Client ID</p>
                            <input type="text" class="form-control" required id="client" value="{{ old('client_id') }}" placeholder="type something">
                            <input type="hidden" name="client_id" id="client_id" value="{{ old('client_id') }}">
                            <div id="client-list"></div>
                        </div>
                        <div class="form-group">
                            <p>Order Date</p>
                            <input type="text" class="form-control" required name="order_date" value="{{ old('order_date') }}" id="datepickers" >
                        </div>
                        <div class="form-group">
                            <p>Duration </p>
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="number" class="form-control" required name="duration" value="1" min="1">
                                </div>
                                <div class="col-md-10">
                                    Day
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <p>Car </p>
                            <select name="car_id" class="form-control">
                                <option value=""> - Select One - </option>
                                @foreach($cars as $car)
                                    <option value="{{ $car->car_id }}" {{($car->car_id == old('car_id') ? 'selected' : '')}} >{{ $car->car_name }} - Rp. {{ number_format($car->price)." a day" }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>
                   
                </div>
                <input type="submit" value="Process">
            </form>
        </div>
    </div>

</section>

@endsection

@push('scripts')
<script>
    $(document).ready(function(e){
        $('#client').keyup(function(){
            var client = $(this).val();
            if(client != ''){
                $.ajax({
                    url:"list-member",
                    method:"GET",
                    data:{data:client},
                    success:function(data){
                        $('#client-list').fadeIn();
                        $('#client-list').html(data);
                    }
                });
            }
        });
    });
    $(document).on('click', '.li-client', function(){
        $('#client').val($(this).text());
        var client_id = $('input[id="client"]').val();
        newClient = client_id.split(" ");
        $('#client_id').val(newClient[0]);
        $('#client-list').fadeOut();
    });
    $(document).on('click', '.li-client-null', function(){
        $('#client').val("");
       
        $('#client_id').val(newClient[0]);
        $('#client-list').fadeOut();
    });

    $("body").mouseup(function(e){
        if($(e.target).closest('#client').length==0){
            $('#client-list').stop().fadeOut();
        }
    });
</script>
@endpush