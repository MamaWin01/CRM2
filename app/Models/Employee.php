<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    //use HasFactory;
    protected $table = 'company_employees';
    protected $fillable = ['first_name', 'last_name','company', 'email', 'phone'];
}
