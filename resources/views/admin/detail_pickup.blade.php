@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-4 m-5">
            <div class="card p-3 border-3">
                <div class="card-body text-center">
                    <h3 class="card-title mb-4">Ini Detail Data Pickup</h3>
{{--                    <h5>Nama User : {{$user}}</h5>--}}
                    <h5>Detail Lokasi : {{$pickup->detail_location}}</h5>
                    <h5>Berat : {{$pickup->weight}}</h5>
                    <h5>Tipe Sampah : {{$pickup->type}}</h5>
                    <h5>Deskripsi : {{$pickup->description}}</h5>
                    <a type="button" class="btn btn-secondary mt-3" href="/admin/pickup-list">Back</a>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

@endsection
