<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPTK extends Model
{
    use HasFactory;
    protected $table = 'pptk';
    protected $guarded = ['id'];
}
