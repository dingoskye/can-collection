<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Can;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CanController extends Controller
{
    public function index(Request $request)
    {
        $query = Can::with('brand');

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->input('brand_id'));
        }

        if ($request->filled('sugarfree')) {
            $query->where('sugarfree', $request->input('sugarfree'));
        }
        if ($request->filled('limited_edition')) {
            $query->where('limited_edition', $request->input('limited_edition'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('sku', 'like', "%{$search}%")
                ->orWhere('gtin', 'like', "%{$search}%")
                ->orWhereHas('brand', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $brands = Brand::all();
        $cans = $query->latest()->get();
//        $cans = Can::all();
        $users = User::all();
        return view('cans.index', compact('cans', 'users', 'brands'));
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
        $brand = Brand::find($id);
        return view('cans.show', compact('can', 'brand'));
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

        $can->save();

        return redirect()->route('cans.index');
    }
}
