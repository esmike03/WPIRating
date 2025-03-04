<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'area_code', 'agent_name', 'partner_name', 'supervisor_name', 'manager_name', 'personalrelation', 'grooming', 'stocks', 'expenses', 'comments'];
}
