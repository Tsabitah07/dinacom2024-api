@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-4 m-5 justify-content-center">
            <div class="card p-3 border-3">
                <div class="card-body text-center">
                    <h3 class="card-title">Selamat Datang di Admin Server Re:cycle</h3>
                </div>
            </div>
            <div class="col text-center justify-content-spaceAround my-3 mx-2">
                <a class="btn btn-outline-primary" href="/admin/user-list">User List</a>
                <a class="btn btn-outline-primary" href="/admin/pickup-list">Pickup List</a>
            </div>
        </div>
    </div>

@endsection
