<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    public function index()
    {
        $dokumentasi = Dokumentasi::get();
        return view('edit-utama.doc', compact('dokumentasi'));
    }

    public function create()
    {
        return view('edit-utama.doc');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_doc' => 'required',
            'judul_doc' => 'required|max:255|string',
            'description_doc' => 'required|max:255|string'
        ], [
            'image_doc.required' => 'Data gambar perlu dimasukkan',
            'judul_doc.mimes' => 'Judul data perlu dimasukkan',
            'description_doc' => 'Deskripsi data perlu dimasukkan'
        ]);

        $imageName = time().'.'.$request->image_doc->extension();
        $request->image_doc->move(public_path('images'), $imageName);

        Dokumentasi::create([
            'image_doc' => $imageName,
            'judul_doc' => $request->judul_doc,
            'description_doc' => $request->description_doc,
        ]);

        return redirect()->back()->with('status','Data added successfully');
    }

    public function destroy(int $id)
    {
        $Documentation = Dokumentasi::findOrFail($id);
        $Documentation->delete();
        return redirect()->back()->with('status','Documentation Deleted Successfully');
    }
}
