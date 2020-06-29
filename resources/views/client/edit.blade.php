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
            <form action="{{ route('client.update', ['client_id' => $client->client_id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>NIK</p>
                            <input type="number" class="form-control" required name="nik" value="{{ $client->nik }}">
                        </div>
                        <div class="form-group">
                            <p>Name</p>
                            <input type="text" class="form-control" required name="name" value="{{ $client->name }}" >
                        </div>
                        <div class="form-group">
                            <p>Date of birth</p>
                            <input type="text" class="form-control" required name="dob" value="{{ $client->dob }}" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Phone</p>
                            <input type="number" class="form-control" required name="phone" value="{{ $client->phone }}">
                        </div>
                        <div class="form-group">
                            <p>Gender</p>
                            <select name="gender" class="form-control">
                                <option value="male" {{ ($client->gender == 'male' ? "selected":"") }}>male</option>
                                <option value="female" {{ ($client->gender == 'female' ? "selected":"") }}>female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Address</p>
                            <input type="text" class="form-control" name="address" value="{{ $client->address }}" >
                        </div>
                    </div>
                </div>
                <input type="submit">
            </form>
        </div>
    </div>
</section> 

@endsection