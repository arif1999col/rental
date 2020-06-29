@extends('layouts.app')

@section('content')

<section class="content">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h3 class="card-title"><a href="{{ route('car.create') }}" class="btn btn-primary">Add New </a> </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Car Name</th>
                        <th>Year</th>
                        <th>License</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $row)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $row['car_name'] }}</td>
                        <td>{{ $row['year'] }}</td>
                        <td>{{ $row['license_plat'] }}</td>
                        <td>{{ number_format($row['price']) }}</td>
                        <td>{{ $row['type'] }}</td>
                        <td>{{ $row['brand_name'] }}</td>
                        <td> 
                            <a href="{{ route('car.edit',  ['car_id' => $row["car_id"]]) }}" class="btn btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                            <a data-id="{{$row['car_id']}}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>                  

@endsection

@push('scripts')
<script>
    $(".delete-btn").click(function(){
        let id = $(this).attr('data-id');
        if(confirm("Apa anda yakin akan menghapus? ")) {
            $.ajax({
                url : "{{url('/')}}/car/"+id,
                method : "POST",
                data : {
                    _token : "{{csrf_token()}}",
                    _method : "DELETE",
                }
            })
            .then(function(data){
                location.reload();
            });
        }
    })
</script>
@endpush