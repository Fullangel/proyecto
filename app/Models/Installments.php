<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    use HasFactory;

    protected $fillable = [
        'credit_id',
        'number_of_installments',
        'duet_date',
        'state',
    ];

    public function credit() {
        return $this->belongsTo(Credit::class);
    }
}
