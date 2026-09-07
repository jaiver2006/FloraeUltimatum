<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Image_Plague;

class ImagePlagueController extends Controller
{
    public function index()
    {
        $imagePlagues = Image_Plague::orderBy('id', 'asc')->get();

        return view('imageplague.index', compact('imagePlagues'));
    }

    public function show($id)
    {
        $imagePlague = Image_Plague::findOrFail($id);

        return view('imageplague.show', compact('imagePlague'));
    }

    public function create()
    {
        return view('imageplague.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/plagues', 'public');

        Image_Plague::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('imageplague.index');
    }

    public function edit($id)
    {
        $imagePlague = Image_Plague::findOrFail($id);

        return view('imageplague.edit', compact('imagePlague'));
    }

    public function update(Request $request, $id)
    {
        $imagePlague = Image_Plague::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($imagePlague->image && Storage::disk('public')->exists($imagePlague->image)) {
                Storage::disk('public')->delete($imagePlague->image);
            }

            $imagePath = $request->file('image')->store('images/plagues', 'public');

            $imagePlague->image = $imagePath;
        }

        $imagePlague->save();

        return redirect()->route('imageplague.index');
    }

    public function destroy($id)
    {
        $imagePlague = Image_Plague::findOrFail($id);

        if ($imagePlague->image && Storage::disk('public')->exists($imagePlague->image)) {
            Storage::disk('public')->delete($imagePlague->image);
        }

        $imagePlague->delete();

        return redirect()->route('imageplague.index');
    }
}
