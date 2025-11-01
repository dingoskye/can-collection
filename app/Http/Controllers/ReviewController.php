<?php

namespace App\Http\Controllers;

use App\Models\Can;
use Auth;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'can'])->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $cans = Can::all();
        return view('reviews.create', compact('cans'));
    }

    public function store(Request $request)
    {
//      @dd($request);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'can_id' => 'required|exists:cans,id',
            'rating_taste' => 'required|numeric|min:1|max:5',
            'rating_design' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review = new Review();
        $review->user_id = $request->input('user_id');
        $review->can_id = $request->input('can_id');
        $review->rating_taste = $request->input('rating_taste');
        $review->rating_design = $request->input('rating_design');
        $review->comment = $request->input('comment');

        $review->save();

        return redirect()->route('reviews.index');
    }

    public function show($id)
    {
        $review = Review::find($id);
        $can = Can::find($id);
        return view('reviews.show', compact('review', 'can'));
    }

    public function edit($id)
    {
        $review = Review::find($id);
        $cans = Can::all();
        return view('reviews.edit', compact('review', 'cans'));
    }
    public function update(Request $request, string $id)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'can_id' => 'required|exists:cans,id',
            'rating_taste' => 'required|numeric|min:1|max:5',
            'rating_design' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review = review::find($id);
        $review->user_id = $request->input('user_id');
        $review->can_id = $request->input('can_id');
        $review->rating_taste = $request->input('rating_taste');
        $review->rating_design = $request->input('rating_design');
        $review->comment = $request->input('review');

        $review->save();

        return redirect()->route('cans.index');
    }

    public function destroy(Review $review)
    {
        abort_if(! auth()->check() || (auth()->id() !== $review->user_id || ! auth()->user()->is_admin), 403);

        $review->delete();
        return back()->with('success', 'Review deleted successfully.');
    }
}
