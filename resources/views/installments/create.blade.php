@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Cuota</h1>
    <form action="{{ route('installments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="credit_id">Credit</label>
            <select name="credit_id" id="credit_id" class="form-control" required>
                @foreach ($credits as $credit)
                <option value="{{ $credit->id }}">
                    {{ $credit->user->name }} - {{ $credit->vehicle->brand }} - {{ $credit->vehicle->model }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="number_of_installments">Numero Cuota</label>
            <input type="number" name="number_of_installments" id="number_of_installments" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount_of_installments">Monto Cuota</label>
            <input type="number" name="amount_of_installments" id="amount_of_installments" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="due_date">Fecha Vencimiento</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="defaulter" class="form-label">Defaulter</label>
            <select name="defaulter" id="defaulter" class="form-control" required>
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="delinquency_amount" class="form-label">Delinquency Amount</label>
            <input type="number" name="delinquency_amount" id="delinquency_amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection
