<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Installments;
use Illuminate\Http\Request;

class InstallmentsController extends Controller
{
    public function index()
    {
        $installments = Installments::with('credit')->get();
        return view('installments.index', compact('installments'));
    }

    public function create()
    {
        $credits = Credit::all();
        return view('installments.create', compact('credits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'credit_id' => 'required|exists:credits,id',
            'number_of_installments' => 'required|integer',
            'amount_of_installments' => 'required|numeric',
            'due_date' => 'required|date',
            'defaulter' => 'required|boolean',
            'delinquency_amount' => 'required|numeric',
        ]);

        Installments::create([
            'credit_id' => $request->credit_id,
            'number_of_installments' => $request->number_of_installments,
            'amount_of_installments' => $request->amount_of_installments,
            'due_date' => $request->due_date,
            'defaulter' => $request->defaulter,
            'delinquency_amount' => $request->delinquency_amount,
        ]);

        return redirect()->route('installments.index');
    }

    public function edit($id)
    {
        $installments = Installments::find($id);
        if(!$installments){
            abort(404);
        }

        $credits = Credit::all();
        dd($installments->id);
        return view('installments.edit', compact('installments', 'credits'));
    }

    public function update(Request $request, Installments $installments)
    {
        $request->validate([
            'credit_id' => 'required|exists:credits,id',
            'number_of_installments' => 'required|integer',
            'amount_of_installments' => 'required|numeric',
            'due_date' => 'required|date',
            'state' => 'required|in:pendiente,pagado',
            'defaulter' => 'required|boolean',
            'delinquency_amount' => 'required|numeric',
        ]);

        $installments->update([
            'credit_id' => $request->credit_id,
            'number_of_installments' => $request->number_of_installments,
            'amount_of_installments' => $request->amount_of_installments,
            'due_date' => $request->due_date,
            'defaulter' => $request->defaulter,
            'delinquency_amount' => $request->delinquency_amount,
        ]);

        return redirect()->route('installments.index');
    }

    public function show(Installments $installments) {

        return view('installments.show', compact('installments'));
    }

    public function destroy(Installments $installments)
    {
        $installments->delete();
        return redirect()->route('installments.index')->with('success', 'Installment deleted successfully.');
    }
}
