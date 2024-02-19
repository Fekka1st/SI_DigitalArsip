<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    use HasFactory;
    protected $table = 'departement';
    protected $guarded = [];
    public function berkas()
    {
        return $this->hasMany(Berkas::class, 'id_department', 'id');
    }
}
