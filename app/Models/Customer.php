<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'customer_code', 'customer_name', 'address', 'personalrelation', 'sales', 'comments'];
}
