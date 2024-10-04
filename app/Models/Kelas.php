<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'kelas';

    // Menggunakan guarded untuk mencegah mass assignment pada kolom 'id'
    protected $guarded = ['id'];

    // Relasi one-to-many dengan model User
    public function users()
    {
        return $this->hasMany(User::class, 'kelas_id');
    }
}
