<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Reservasi;
use App\Models\Vaksin;

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
    try {
        $validated = $request->validate([
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

        $reservasi = Reservasi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat!',
            'data' => $reservasi
        ], 201); // 201 Created
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validasi gagal.',
            'errors' => $e->errors()
        ], 422); // 422 Unprocessable Entity
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan saat membuat reservasi.',
            'error' => $e->getMessage()
        ], 500); // 500 Internal Server Error
    }
}
    // Menampilkan kartu imunisasi
    public function kartuImunisasi(Request $request)
    {
       
        $nik = $request->query('nik'); // Ambil query parameter ?nik=...
        $reservasi = Reservasi::with('vaksin')->where('nik', $nik)->firstOrFail();

        return $reservasi;


    }

    
    //
}
