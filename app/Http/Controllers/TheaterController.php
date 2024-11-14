<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::all();
        return view('theaters.index', compact('theaters'));
    }

    public function show($id)
    {
        $theater = Theater::with('sessions.movie')->findOrFail($id);
        return view('theaters.show', compact('theater'));
    }
}
