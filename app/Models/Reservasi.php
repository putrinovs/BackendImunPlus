<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
      protected $fillable = [
        'nama_ibu',
        'nik',
        'tanggal_lahir',
        'alamat',
        'golongan_darah',
        'jenis_kelamin',
        'lokasi',
        'tanggal_reservasi',
        'waktu_reservasi',
        'vaksin_id',
    ];
    
    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }
    //
}
