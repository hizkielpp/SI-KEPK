<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProposalController extends Controller
{
    // index function 
    public function index()
    {
        return view('proposal.index');
    }
    // create function
    public function create()
    {
        return view('proposal.create');
    }
    // insert function
    public function insert(Request $request)
    {
        return $request;
    }
}
