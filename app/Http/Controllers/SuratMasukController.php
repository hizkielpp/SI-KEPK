<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
   // Display page
   public function index()
   {
      return view('surat-masuk.surat-masuk');
   }
}
