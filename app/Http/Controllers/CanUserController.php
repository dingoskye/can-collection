<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Can;

class CanUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cans = $user->cans;

        return view('collection.index', compact('cans'));
    }

    public function create()
    {
//        return view('cans.create');
    }

    public function show(Can $can)
    {
//        return view('cans.show', compact('can'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'can_id' => 'required|exists:cans,id',
        ]);

        $user = Auth::user();

        // Controleer of de can al in de collectie zit
        if ($user->cans()->where('can_id', $request->can_id)->exists()) {
            return back()->with('message', 'Dit blikje zit al in je collectie!');
        }

        $user->cans()->attach($request->can_id);

        return redirect()->route('collection.index')
            ->with('success', 'Blikje toegevoegd aan je collectie!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $user->cans()->detach($id);

        return redirect()->route('collection.index')
            ->with('success', 'Can removed out of your collection.');
    }
}
