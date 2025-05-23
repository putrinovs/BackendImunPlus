<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
   public function vaksin()


   {
     $vaksin= vaksin::all()->groupBy('kategori');
         return Inertia::render('VaksinPage', [
            'vaksin' => $vaksin
          ]);
   }



    //
}
