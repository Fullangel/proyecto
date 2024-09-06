@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Cuota</h1>
    <form action="{{ route('installments.update', $installments->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="credit_id">Credit</label>
            <select name="credit_id" id="credit_id" class="form-control" required>
                @foreach ($credits as $credit)
                <option value="{{ $credit->id }}" {{ $credit->id == $installments->credit_id ? 'selected' : '' }}>
                    {{ $credit->user->name }} - {{ $credit->vehicle->brand }} - {{ $credit->vehicle->model }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="number_of_installments">Numero Cuota</label>
            <input type="number" name="number_of_installments" id="number_of_installments" class="form-control" value="{{ $installments->number_of_installments }}" required>
        </div>
        <div class="form-group">
            <label for="amount_of_installments">Monto Cuota</label>
            <input type="number" name="amount_of_installments" id="amount_of_installments" class="form-control" step="0.01" value="{{ $installments->amount_of_installments }}" required>
        </div>
        <div class="form-group">
            <label for="due_date">Fecha Vencimiento</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $installments->due_date }}" required>
        </div>
        <div class="form-group">
            <label for="state">Estado</label>
            <select name="state" id="state" class="form-control" required>
                <option value="pendiente" {{ $installments->state == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="pagado" {{ $installments->state == 'pagado' ? 'selected' : '' }}>Pagado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="delinquency_amount" class="form-label">Delinquency Amount</label>
            <input type="number" name="delinquency_amount" id="delinquency_amount" class="form-control" value="{{ old('delinquency_amount', $installments->delinquency_amount) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
