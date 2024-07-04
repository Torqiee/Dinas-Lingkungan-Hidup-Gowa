<?php

namespace App\Http\Controllers;

use App\Models\Penanggung;
use Illuminate\Http\Request;

class PenanggungController extends Controller
{
    public function index()
    {
        $penanggung = Penanggung::get();
        return view('edit-utama.penanggung', compact('penanggung'));
    }

    public function create()
    {
        return view('edit-utama.penanggung');
    }

    public function store(Request $request)
    {
        $imageName = $request->image_penanggung->getClientOriginalName();
        $request->image_penanggung->move(public_path('images'), $imageName);

        Penanggung::create([
            'image_penanggung' => $imageName,
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description
        ]);
        return redirect()->back()->with('status','Data added successfully');
    }

    public function destroy(int $id)
    {
        $Nanggung = Penanggung::findOrFail($id);
        $Nanggung->delete();
        return redirect()->back()->with('status','Penanggung Deleted Successfully');
    }
}
