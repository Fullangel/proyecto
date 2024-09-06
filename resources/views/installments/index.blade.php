@extends('layouts.app')

@section('content')
<div class="container">
    <h1>installmentss</h1>
    <a href="{{ route('installments.create') }}" class="btn btn-primary">Add installments</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Credit</th>
                <th>Numero Cuotas</th>
                <th>Monto Cuotas</th>
                <th>Fecha Vencimiento</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($installments as $installment)
            <tr>
                <td>{{ $installment->credit->user->name }} - {{ $installment->credit->vehicle->brand }} - {{ $installment->credit->vehicle->model }}</td>
                <td>{{ $installment->number_of_installments }}</td>
                <td>{{ $installment->amount_of_installments }}</td>
                <td>{{ $installment->due_date }}</td>
                <td>{{ ucfirst($installment->state) }}</td>
                <td>
                    <a href="{{ route('installments.edit', $installment->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('installments.destroy', $installment->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
