<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{

    protected $fillable = [
        'id',
        'amount',
        'purchased_quantity',
    ];
}
