@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Detalles de la Cuota</h1>

    <p><strong>Crédito:</strong> {{ $installments->credit_id }}</p>
    <p><strong>Número de Cuotas:</strong> {{ $installments->number_of_installments }}</p>
    <p><strong>Monto de Cuota:</strong> {{ $installments->amount_of_installments }}</p>
    <p><strong>Fecha de Vencimiento:</strong> {{ $installments->due_date }}</p>
    <p><strong>Defaulter:</strong> {{ $installments->defaulter ? 'Sí' : 'No' }}</p>
    <p><strong>Monto de Mora:</strong> {{ $installments->delinquency_amount }}</p>

    <a href="{{ route('installments.edit', $installments->id) }}" class="btn btn-primary">Editar</a>

    <form action="{{ route('installments.destroy', $installments->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

    <a href="{{ route('installments.index') }}" class="btn btn-secondary">Regresar</a>
</div>

@endsection
