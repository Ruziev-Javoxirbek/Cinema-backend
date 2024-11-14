<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function show($id)
    {
        $city = City::with('theaters')->findOrFail($id);
        return view('cities.show', compact('city'));
    }
}


