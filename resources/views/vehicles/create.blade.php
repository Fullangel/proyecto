@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Vehicle</h1>
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="brand" class="form-label">Marca</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Modelo</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Año</label>
            <input type="number" name="date" id="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="plate" class="form-label">Placa</label>
            <input type="text" name="plate" id="plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
