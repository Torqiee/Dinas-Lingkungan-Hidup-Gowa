<?php

namespace App\Http\Controllers;

use App\Models\Pihak;
use Illuminate\Http\Request;

class PihakController extends Controller
{
    public function index()
    {
        $pihak = Pihak::get();
        return view('edit-utama.pihak', compact('pihak'));
    }

    public function create()
    {
        return view('edit-utama.pihak');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_pihak' => 'required'
        ]);
        $imageName = time().'.'.$request->image_pihak->extension();
        $request->image_pihak->move(public_path('images'), $imageName);

        Pihak::create([
            'image_pihak' => $imageName
        ]);
        return redirect()->back()->with('status','Pihak Data added successfully');
    }

    public function destroy(int $id)
    {
        $Pihak = Pihak::findOrFail($id);
        $Pihak->delete();
        return redirect()->back()->with('status','Pihak Deleted Successfully');
    }
}
