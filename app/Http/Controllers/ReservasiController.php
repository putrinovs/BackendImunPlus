<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Model\Reservasi;
use App\Model\Vaksin;

class ReservasiController extends Controller
{
    public function create()
    {
        $vaksin = Vaksin::all(); // Mengambil semua data vaksin

          return Inertia::render('ReservasiImunisasiPage', [
            'vaksin' => $vaksin
          ]);
          
    }

    // Menyimpan data reservasi ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:reservasi,nik',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'golongan_darah' => 'nullable|string|max:3',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'lokasi' => 'required|string|max:255',
            'tanggal_reservasi' => 'required|date',
            'waktu_reservasi' => 'required',
            'vaksin_id' => 'required|exists:vaksin,id',
        ]);

        Reservasi::create($request->all());

        return redirect()->route('kartu-imunisasi', ['nik' => $request->nik])
            ->with('success', 'Reservasi berhasil dibuat!');
    }

    // Menampilkan kartu imunisasi
    public function kartuImunisasi($nik)
    {
        $reservasi = Reservasi::with('vaksin')->where('nik', $nik)->firstOrFail();

        return Inertia::render('KartuImunisasiPage', [
            'reservasi' => $reservasi
            
        ]);


    }

    
    //
}
