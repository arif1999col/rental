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
            <form action="{{ route('car.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Car Name</p>
                            <input type="text" class="form-control" required name="car_name" value="{{ old('car_name') }}" >
                        </div>
                        <div class="form-group">
                            <p>Year</p>
                            <input type="number" class="form-control" required name="year" value="{{ old('year') }}">
                        </div>
                        <div class="form-group">
                            <p>License Plat</p>
                            <input type="text" class="form-control" required name="license_plat" value="{{ old('license_plat') }}">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Price</p>
                            <input type="number" class="form-control" required name="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <p>Type</p>
                            <select name="type" class="form-control">
                                <option>- Select one -</option>
                                <option value="manual" {{ (old("type") == 'manual' ? "selected":"") }}>Manual</option>
                                <option value="matic" {{ (old("type") == 'matic' ? "selected":"") }}>Matic</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Brand</p>
                            <select name="brand_id" class="form-control">
                                <option value=''>- Select one -</option>
                                @foreach($brands as $list)
                                    <option value="{{ $list['brand_id'] }}"> {{$list['brand_name']}} </option>
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