<?php

namespace App\Http\Controllers;

use App\Models\DataFile;
use App\Models\DataKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view data perusahaan', ['only' => ['index']]);
    }

    public function index(Request $request, int $fileId)
    {
        $search = $request->input('search', '');
        $kegiatan = DataKegiatan::findOrFail($fileId);
        if ($search != "") {
            $DataFile = DataFile::where('file_id', $fileId)
                                ->where('file', 'LIKE', "%$search%")
                                ->get();
        } else {
            $DataFile = DataFile::where('file_id', $fileId)->get();
        }
        // $kegiatan = DataKegiatan::all();
        return view('pemohon.data-file.index', compact('DataFile', 'search', 'kegiatan'));
    }


    public function store(Request $request, int $fileId)
    {
        $request->validate([
            'files.*' => 'required|mimes:png,jpg,jpeg,webp,pdf,docx,pptx,svg,heic,hevc,avif,mp4'
        ], [
            'files.required' => 'Data perlu dimasukkan',
            'files.mimes' => 'Format data yang dimasukkan tidak benar'
        ]);

        $files = DataKegiatan::findOrFail($fileId);

        $fileData = [];
        if($File = $request->file('files')){
            foreach($File as $Data){
                $name = $Data->getClientOriginalName();
                $filename = $name;

                $path = 'assets/';
                $Data->move($path, $filename);
                $fileData[] = [
                    'file_id' => $files->id,
                    'file' => $filename
                ];
            }
        }

        DataFile::insert($fileData);
        return redirect()->back()->with('status', 'File Berhasil Diupload');
    }

    public function destroy(int $fileDataId)
    {
        $DataFile = DataFile::findOrFail($fileDataId);
        if(File::exists($DataFile->file)){
            File::delete($DataFile->file);
        }
        $DataFile->delete();
        return redirect()->back()->with('status', 'File Berhasil Dihapus');
    }

    public function addComment(Request $request, int $fileDataId)
    {
        $request->validate([
            'comment' => 'nullable|string|max:255',
        ]);

        $file = DataFile::findOrFail($fileDataId);
        $file->update(['comment' => $request->comment]);

        return redirect()->back()->with('status', 'Komentar berhasil Diperbarui');
    }

    public function deleteComment(Request $request, $fileDataId)
    {
        // Find the data file with the given ID
        $dataFile = DataFile::findOrFail($fileDataId);

        // Check if a comment exists
        if ($dataFile->comment) {
            // Delete the comment
            $dataFile->update(['comment' => null]);

            return redirect()->back()->with('status', 'Comment deleted successfully.');
        }

        return redirect()->back()->with('status', 'No comment found to delete.');
    }
}
