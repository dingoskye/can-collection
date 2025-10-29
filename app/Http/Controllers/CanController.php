<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Can;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'content' => 'required|numeric|min:0',
            'color' => 'required|string|max:100',
            'release_year' => 'required|digits:4|integer|min:1800|max:' . (date('Y')),
            'sugarfree' => 'required|boolean',
            'calories' => 'required|integer|min:0',
            'limited_edition' => 'required|boolean',
            'caffeine' => 'required|integer|min:0',
            'carbonated' => 'required|boolean',
            'description' => 'required|string',
            'country' => 'required|string|max:100',
            'sku' => 'nullable|string|max:100|unique:cans,sku',
            'gtin' => 'nullable|string|max:100|unique:cans,gtin',
        ]);

        $can = new Can();
        $can->brand_id = $request->input('brand_id');
        $can->name = $request->input('name');
        $can->content = $request->input('content');
        $can->color = $request->input('color');
        $can->release_year = $request->input('release_year');
        $can->sugarfree = $request->boolean('sugarfree');
        $can->calories = $request->input('calories');
        $can->limited_edition = $request->boolean('limited_edition');
        $can->caffeine = $request->input('caffeine');
        $can->carbonated = $request->boolean('carbonated');
        $can->description = $request->input('description');
        $can->country = $request->input('country');
        $can->sku = $request->input('sku');
        $can->gtin = $request->input('gtin');

        $can->save();

        return redirect()->route('cans.show', $can)->with('success', 'Can created successfully.');
    }

    public function show($id)
    {
        $can = Can::find($id);
        return view('cans.show', compact('can'));
    }

    public function edit($id)
    {
        $can = Can::find($id);
        $brands = Brand::all();
        return view('cans.edit', compact('can', 'brands'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'content' => 'required|numeric|min:0',
            'color' => 'required|string|max:100',
            'release_year' => 'required|digits:4|integer|min:1800|max:' . (date('Y')),
            'sugarfree' => 'required|boolean',
            'calories' => 'required|integer|min:0',
            'limited_edition' => 'required|boolean',
            'caffeine' => 'required|integer|min:0',
            'carbonated' => 'required|boolean',
            'description' => 'required|string',
            'country' => 'required|string|max:100',
            'sku' => 'nullable|string|max:100',
            'gtin' => 'nullable|string|max:100',
        ]);

        $can = Can::find($id);
        $can->brand_id = $request->input('brand_id');
        $can->name = $request->input('name');
        $can->content = $request->input('content');
        $can->color = $request->input('color');
        $can->release_year = $request->input('release_year');
        $can->sugarfree = $request->input('sugarfree');
        $can->limited_edition = $request->input('limited_edition');
        $can->caffeine = $request->input('caffeine');
        $can->carbonated = $request->input('carbonated');
        $can->description = $request->input('description');
        $can->country = $request->input('country');
        $can->sku = $request->input('sku');
        $can->gtin = $request->input('gtin');
//        $can->update([
//            'brand_id' => $request->input('brand_id'),
//            'name' => $request->input('name'),
//            'content' => $request->input('content'),
//            'color' => $request->input('color'),
//            'release_year' => $request->input('release_year'),
//            'sugarfree' => $request->boolean('sugarfree'),
//            'limited_edition' => $request->boolean('limited_edition'),
//            'caffeine' => $request->input('caffeine'),
//            'carbonated' => $request->boolean('carbonated'),
//            'description' => $request->input('description'),
//            'country' => $request->input('country'),
//            'sku' => $request->input('sku'),
//            'gtin' => $request->input('gtin'),
//        ]);

        $can->save();

        return redirect()->route('cans.index');
    }
}
