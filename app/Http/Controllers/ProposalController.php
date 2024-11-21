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
}
