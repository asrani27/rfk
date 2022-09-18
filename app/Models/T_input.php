<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_input extends Model
{
    use HasFactory;
    protected $table = 't_input';
    protected $guarded = ['id'];
}
