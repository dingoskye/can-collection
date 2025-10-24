<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
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

        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->year_founded = $request->input('year_founded');
        $brand->headquarters = $request->input('headquarters');
        $brand->founder = $request->input('founder');

        $brand->save();

        return redirect()->route('brands.details', $brand)->with('success', 'Brand created successfully.');
    }
}
