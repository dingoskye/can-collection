<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
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

        $review = new Review();
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->year_founded = $request->input('year_founded');
        $review->headquarters = $request->input('headquarters');
        $review->founder = $request->input('founder');

        $review->save();

        return redirect()->route('reviews.show', $review)->with('success', 'Review created successfully.');
    }
}
