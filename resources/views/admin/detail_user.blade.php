@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-4 m-5">
            <div class="card p-3 border-3">
                <div class="card-body text-center">
                    <h3 class="card-title mb-4">Ini Detail Data User</h3>
                    <h5>ID : {{$user->id}}</h5>
                    <h5>Nama : {{$user->name}}</h5>
                    <h5>Email : {{$user->email}}</h5>
                    <h5>Phone Number : {{$user->phone_number}}</h5>
                    <h5>Points : {{$user->points}}</h5>
                    <a type="button" class="btn btn-secondary mt-3" href="/admin/user-list">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
