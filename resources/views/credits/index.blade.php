@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Credits</h1>
    <a href="{{ route('credits.create') }}" class="btn btn-primary mb-3">Add Credit</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Vehicle</th>
                <th>Monto</th>
                <th>Fecha Solicitud</th>
                <th>Estado</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($credits as $credit)
            <tr>
                <td>{{ $credit->user->name }}</td>
                <td>{{ $credit->vehicle->model }} - {{ $credit->vehicle->model }}</td>
                <td>{{ $credit->amount }}</td>
                <td>{{ $credit->application_date }}</td>
                <td>{{ ucfirst($credit->state) }}</td>
                <td>
                    <a href="{{ route('credits.edit', $credit) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('credits.destroy', $credit) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




{{-- @extends('layouts.app');

@section('content')
<div class="container">
    <h1>Solicitar credito</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('credits.apply') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for='vehicle_id' class="form-label">Vehiculo</label>
            <select name='vehicle_id' id="vehicle_id" class="forma-control">
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} - {{ $vehicle->moodel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Monto</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for='application_date' class="form-label">Fecha de solicitud</label>
            <input type="date" name='application_date' id="application_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Solicitar credito</button>
    </form>
</div>
@endsection --}}
