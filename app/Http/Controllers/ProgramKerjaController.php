<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index()
    {
        $proker = ProgramKerja::get();
        return view('edit-utama.proker', compact('proker'));
    }

    public function create()
    {
        return view('edit-utama.proker');
    }

    public function store(Request $request)
    {
        $imageName = time().'.'.$request->image_prog->extension();
        $request->image_prog->move(public_path('images'), $imageName);

        ProgramKerja::create([
            'image_prog' => $imageName,
            'judul_prog' => $request->judul_prog,
            'description_prog' => $request->description_prog,
        ]);
        return redirect()->back()->with('status','Data added successfully');
    }

    public function destroy(int $id)
    {
        $Proker = ProgramKerja::findOrFail($id);
        $Proker->delete();
        return redirect()->back()->with('status','Program Kerja Deleted Successfully');
    }
}
