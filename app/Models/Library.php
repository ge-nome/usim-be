<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = 'libraries';
    protected $fillable =[
        'account_no',
        'mat_no',
        'status',
        'return_date'
    ];
}
