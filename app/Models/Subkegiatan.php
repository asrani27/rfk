<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkegiatan extends Model
{
    use HasFactory;
    protected $table = 'subkegiatan';
    protected $guarded = ['id'];

    public function uraian()
    {
        return $this->hasMany(Uraian::class, 'subkegiatan_id');
    }
}
