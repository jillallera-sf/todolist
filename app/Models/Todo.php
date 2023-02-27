<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable =[
        'is_checked',
        'task',
        'due'
    ];

    protected $casts=[
        'is_checked'
    ];

}
