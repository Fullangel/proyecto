<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $credits = Credit::all();
        return view('admin.credits.index'. compact('credits'));
    }

    public function show($id){
        $credit = Credit::find($id);
        return view('admin.credits.show', compact('credit'));
    }
}
