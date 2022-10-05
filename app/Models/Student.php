<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'mat_no',
        'surname',
        'firstname',
        'department',
        'email',
        'school',
        'course',
        'level',
        'qr_hash',
        'passport',
    ];
    
}
