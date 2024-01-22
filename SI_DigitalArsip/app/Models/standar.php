<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standar extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'standarisasis';
    protected $guarded = [];
    public function berkas()
    {
        return $this->hasMany(Berkas::class, 'id_standarisasi', 'id');
    }
}
