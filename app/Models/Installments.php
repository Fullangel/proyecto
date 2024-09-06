<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installments extends Model
{
    use HasFactory;

    protected $table = 'installments';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'credit_id',
        'number_of_installments',
        'due_date',
        'amount_of_installments',
        'state',
        'defaulter',
        'delinquency_amount',
    ];

    public function credit() {
        return $this->belongsTo(Credit::class);
    }
}
