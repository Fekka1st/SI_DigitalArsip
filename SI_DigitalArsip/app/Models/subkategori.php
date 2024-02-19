<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkategori extends Model
{
    use HasFactory;
    protected $table = 'subkategoris';
    protected $guarded = [];
    public function berkas()
    {
        return $this->hasMany(Berkas::class, 'id_subkategori', 'id');
    }
}
