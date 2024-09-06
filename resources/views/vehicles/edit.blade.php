@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Vehicle</h1>
    <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ $vehicle->marca }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" name="brand" id="model" class="form-control" value="{{ $vehicle->modelo }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Año</label>
            <input type="number" name="date" id="date" class="form-control" value="{{ $vehicle->año }}" required>
        </div>
        <div class="mb-3">
            <label for="plate" class="form-label">Placa</label>
            <input type="text" name="plate" id="plate" class="form-control" value="{{ $vehicle->placa }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
