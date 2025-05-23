<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    protected $table = "vaksin";
    protected $fillable = ['nama_vaksin', 'deskripsi', 'kategori'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
    //
}
