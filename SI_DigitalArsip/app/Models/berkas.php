<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
    public function department()
    {
        return $this->belongsTo(departement::class, 'id_department', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function subkategori()
    {
        return $this->belongsTo(subkategori::class, 'id_subkategori', 'id');
    }
    public function standarisasi()
    {
        return $this->belongsTo(standar::class, 'id_standarisasi', 'id');
    }
}
