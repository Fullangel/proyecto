<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Installments;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function apply(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);
        Credit::create($request->all());
        return redirect()->route('credits.index')->with('success', 'Solicitud de credito enviada');
    }

    public function approve($id) {
        $credit = Credit::findOrFail($id);
        $credit->update(['state' => 'approved']);

        // Coutas de creditos
        $cuotaCount = 12;  //12 cuotas pero se puede rebajar
        $mountCuota = $credit->mount / $cuotaCount;

        for ($i = 1; $i <= $cuotaCount; $i++) {
            Installments::create([
                'credit_id' => $credit->id,
                'number' => $i,
                'mount' => $mountCuota,
                'due_date' => now()->addMonths($i),'state' => 'pending',
            ]);
        }

        return redirect()->route('credits.index')->with('success', 'Credito aprobado y cuotas generadas');

    }

    public function reject($id) {
        $credit = Credit::findOrFail($id);
        $credit->update(['state' => 'refused']);
        return redirect()->route('credits.index')->with('success', 'Credito rechazado');
    }
};
