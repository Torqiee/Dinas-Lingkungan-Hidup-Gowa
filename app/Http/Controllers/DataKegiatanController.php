<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataKegiatan;
use Illuminate\Http\Request;

class DataKegiatanController extends Controller
{
    public function index(Request $request, $kegiatanId)
    {
        $search = $request->input('search', '');
        $kegiatan = Category::findOrFail($kegiatanId);
        if ($search != "") {
            $DataKegiatan = DataKegiatan::where('kegiatan_id', $kegiatanId)
                                ->where('nama_kegiatan', 'LIKE', "%$search%")
                                ->get();
        } else {
            $DataKegiatan = DataKegiatan::where('kegiatan_id', $kegiatanId)->get();
        }
        $categories = Category::all();
        return view('pemohon.data-kegiatan.index', compact('kegiatan', 'DataKegiatan', 'search', 'categories'));
    }

    public function create($kegiatanId)
    {
        $kegiatan = Category::findOrFail($kegiatanId);
        return view('pemohon.data-kegiatan.create', compact('kegiatan'));
        // return view('pemohon.data-kegiatan.create');
    }

    public function store(Request $request, int $kegiatanId)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'alamat_kegiatan' => 'required|max:255',
            'jenis_kegiatan' => 'required|max:255',
            'kordinat_kegiatan' => 'required|max:255',
            'besaran_kegiatan' => 'required|max:255',
            'rintek' => 'sometimes',
            'pertek' => 'sometimes'
        ]);

        $kegiatan = Category::findOrFail($kegiatanId);

        DataKegiatan::create([
            'kegiatan_id' => $kegiatan->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'alamat_kegiatan' => $request->alamat_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'kordinat_kegiatan' => $request->kordinat_kegiatan,
            'besaran_kegiatan' => $request->besaran_kegiatan,
            'rintek' => $request->has('rintek') ? 1 : 0,
            'pertek' => $request->has('pertek') ? 1 : 0
        ]);

        return redirect()->back()->with('status', 'Kegiatan Berhasil Dibuat');
    }

    public function edit($kegiatanId)
    {
        $kegiatan = DataKegiatan::findOrFail($kegiatanId);
        return view('pemohon.data-kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, int $kegiatanId)
    {
        $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'alamat_kegiatan' => 'required|max:255',
            'jenis_kegiatan' => 'required|max:255',
            'kordinat_kegiatan' => 'required|max:255',
            'besaran_kegiatan' => 'required|max:255',
            'rintek' => 'sometimes',
            'pertek' => 'sometimes'
        ]);

        $kegiatan = DataKegiatan::findOrFail($kegiatanId);
        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'alamat_kegiatan' => $request->alamat_kegiatan,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'kordinat_kegiatan' => $request->kordinat_kegiatan,
            'besaran_kegiatan' => $request->besaran_kegiatan,
            'rintek' => $request->has('rintek') ? 1 : 0,
            'pertek' => $request->has('pertek') ? 1 : 0
        ]);

        return redirect()->back()->with('status','Data Kegiatan Berhasil Diupdate');
    }

    public function destroy(int $kegiatanId)
    {
        $kegiatan = DataKegiatan::findOrFail($kegiatanId);
        $kegiatan->delete();
        return redirect()->back()->with('status','Data Kegiatan Berhasil Dihapus');
    }
}
