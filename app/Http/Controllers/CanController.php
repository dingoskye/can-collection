<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Can;
use Illuminate\Http\Request;

class CanController extends Controller
{
    public function index()
    {
        $cans = Can::all();
        return view('cans.index', compact('cans'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('cans.create', compact('brands'));
    }

    public function show(Can $can)
    {
        return view('cans.show', compact('can'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'year_founded' => 'required|digits:4|integer|min:1800|max:' . (date('Y')),
            'headquarters' => 'required|string|max:255',
            'founder' => 'required|string|max:255',
        ]);

        $can = new Can();
        $can->name = $request->input('name');
        $can->description = $request->input('description');
        $can->year_founded = $request->input('year_founded');
        $can->headquarters = $request->input('headquarters');
        $can->founder = $request->input('founder');

        $can->save();

        return redirect()->route('cans.show', $can)->with('success', 'Can created successfully.');
    }
}
