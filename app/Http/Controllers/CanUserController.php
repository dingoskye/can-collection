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

    public function show(Can $can)
    {
        return view('cans.show', compact('can'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'can_id' => 'required|exists:cans,id',
        ]);

        $user = Auth::user();

        // Controleer of de can al in de collectie zit
        if ($user->cans()->where('can_id', $request->can_id)->exists()) {
            return back()->with('message', 'This can is already in your collection!');
        }

        $user->cans()->attach($request->can_id);

        return redirect()->route('collection.index')
            ->with('success', 'Blikje toegevoegd aan je collectie!');
    }

    public function edit($id)
    {
        $can = Can::find($id);


        return view('collection.edit', compact('can'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'condition' => 'nullable|string',
            'date_acquired' => 'nullable|date|before_or_equal:today',
            'notes' => 'nullable|string',
        ]);

        // Ophalen van de pivot record via de koppeltabel can_user
        $collection = auth()->user()->cans()->wherePivot('id', $id)->first();

        if (!$collection) {
            return redirect()->back()->withErrors('Collectie niet gevonden.');
        }

//        $can = Can::find($id);
//        $can->pivot->condition = $request->input('condition');
//        $can->pivot->date_acquired = $request->input('date_acquired');
//        $can->pivot->notes = $request->input('notes');
//
//        $can->save();
        // Updaten van de pivot data
        $collection->pivot->update([
            'condition' => $request->condition,
            'date_acquired' => $request->date_acquired,
            'notes' => $request->notes,
        ]);
        $collection->save();

        return redirect()->route('collection.index');
    }

    public function remove($can_id)
    {
        $user = Auth::user();
        $user->cans()->detach($can_id);

        return redirect()->route('collection.index')
            ->with('success', 'Can removed out of your collection.');
    }
}
