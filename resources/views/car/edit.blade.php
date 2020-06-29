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
            <h3 class="card-title">Form {{$title}} </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('car.update', ['car_id' => $car->car_id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Car Name</p>
                            <input type="text" class="form-control" required name="car_name" value="{{ $car->car_name }}" >
                        </div>
                        <div class="form-group">
                            <p>Year</p>
                            <input type="number" class="form-control" required name="year" value="{{ $car->year }}">
                        </div>
                        <div class="form-group">
                            <p>License Plat</p>
                            <input type="text" class="form-control" required name="license_plat" value="{{ $car->license_plat }}">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Price</p>
                            <input type="number" class="form-control" required name="price" value="{{ $car->price }}">
                        </div>
                        <div class="form-group">
                            <p>Type</p>
                            <select name="type" class="form-control">
                                <option>- Select one -</option>
                                <option value="manual" {{ ($car->type == 'manual' ? "selected":"") }}>Manual</option>
                                <option value="matic" {{ ($car->type == 'matic' ? "selected":"") }}>Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Brand</p>
                            <select name="brand_id" class="form-control">
                                <option value="">- Select one -</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->brand_id}}" {{($car->brand_id == $brand->brand_id ? 'selected' : '')}} >{{$brand->brand_name}}</option>
                                 @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section> 

@endsection