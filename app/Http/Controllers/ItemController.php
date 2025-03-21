<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::where('user_id', auth()->id())
            ->latest()
            ->get()
            ->groupBy('isFinished');

        return view('index', [
            "items" => $items[0] ?? [],
            "itemsDone" => $items[1] ?? []
        ]);
    }
    public function show($id)
    {
        $item = Item::where('user_id', auth()->id())->findOrFail($id);

        return view('update', [
            "items" => $item,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("items/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {


        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'enddate' => ['required', 'date']
        ]);

        Item::create([
            'user_id' => auth()->id(),
            'name' => $attributes['name'],
            'description' => $attributes['description'],
            'endDate' => $attributes['enddate'],
        ]);

        return redirect('/')->with('success', 'Nieuwe TODO aangemaakt!');
    }




    public function done(Item $item)
    {
        // Ensure the user owns the item
        if ($item->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to update this item.');
        }

        // Update the item status using mass assignment
        $item->update(['isFinished' => 1]);

        // Redirect with a success message
        return redirect('/')->with('success', 'TODO marked as done!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Check if the item belongs to the authenticated user
        if ($item->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to delete this item.');
        }


        $item->delete();


        return redirect()->back()->with('success', 'Item deleted successfully!');
    }

    public function update(Request $request, Item $item)
    {
        if ($item->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You do not have permission to update this item.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'endDate' => 'nullable|date',
        ]);

        $item->update($validated);

        return redirect("/")->with('success', 'Item updated successfully.');
    }
}
