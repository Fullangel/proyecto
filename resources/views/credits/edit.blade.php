@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Credit</h1>
    <form action="{{ route('credits.update', $credit) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $credit->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="form-select" required>
                @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ $vehicle->id == $credit->vehicle_id ? 'selected' : '' }}>
                    {{ $vehicle->brand }} - {{ $vehicle->model }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" name="amount" id="amount" class="form-control" step="0.01" value="{{ $credit->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="application_date" class="form-label">Fecha Solicitud</label>
            <input type="date" name="application_date" id="application_date" class="form-control" value="{{ $credit->application_date }}" required>
        </div>
        <div class="mb-3">
            <label for="state" class="form-label">Estado</label>
            <select name="state" id="state" class="form-select" required>
                <option value="pendiente" {{ $credit->state == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="aprobado" {{ $credit->state == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="rechazado" {{ $credit->state == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
