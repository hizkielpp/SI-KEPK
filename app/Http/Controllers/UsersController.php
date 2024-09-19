<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   // Display page
   public function index()
   {
      return view('kelola-pengguna.kelola-pengguna');
   }

   // Create page
   public function create()
   {
      return view('kelola-pengguna.tambah-pengguna');
   }
}
