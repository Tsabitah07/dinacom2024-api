@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-4 m-5">
            <div class="card p-3 border-3">
                <div class="card-body text-center">
                    <h3 class="card-title">Edit Pickup</h3>

                    <form method="post" action="/admin/pickup/update/{{ $pickup->id }}">
                        @csrf

                        <div class="form-group text-start mb-3">
                            <label for="detail_location">Detail lokasi:</label>
                            <input type="text" name="detail_location" id="detail_location" class="form-control" required value="{{ $pickup->detail_location }}" readonly>
                        </div>

                        <div class="form-group text-start mb-3">
                            <label for="weight">Berat:</label>
                            <input type="number" name="weight" id="weight" class="form-control" required value="{{ $pickup->weight }}">
                        </div>

                        <div class="form-group text-start mb-3">
                            <label for="type">Tipe:</label>
                            <input type="text" name="type" id="type" class="form-control" required value="{{ $pickup->type }}">
                        </div>

                        <div class="form-group text-start mb-3">
                            <label for="description">Deskripsi:</label>
                            <input type="text" name="description" id="description" class="form-control" required value="{{ $pickup->description }}">
                        </div>

                        <div class="form-group text-start mb-3">
                            <label for="points">Points:</label>
                            <input type="number" name="points" id="points" class="form-control" required value="{{ $pickup->points }}">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 px-5" onclick="return showAlert()">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAlert() {
            alert("Data updated successfully!");
        }
    </script>

@endsection
