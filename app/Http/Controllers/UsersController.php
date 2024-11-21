<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   // Display page
   public function index()
   {
      return view('user.index');
   }

   // create page
   public function create()
   {
      return view('user.create');
   }
   // add user
   public function add(Request $request)
   {
      $validated = $request->validate([
         'title' => 'required|unique:posts|max:255',
         'body' => 'required',
      ]);

      // The blog post is valid...

      return redirect('/posts');
   }
}
