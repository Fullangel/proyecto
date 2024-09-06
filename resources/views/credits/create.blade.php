@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Credit</h1>
    <form action="{{ route('credits.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="form-select" required>
                @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} - {{ $vehicle->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="application_date" class="form-label">Fecha Solicitud</label>
            <input type="date" name="application_date" id="application_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
