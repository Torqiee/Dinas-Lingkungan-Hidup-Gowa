<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataFile;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view data perusahaan', ['only' => ['index']]);
        $this->middleware('permission:create data perusahaan', ['only' => ['create','store']]);
        $this->middleware('permission:edit data perusahaan', ['only' => ['update','edit']]);
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $categories = Category::where('name', 'LIKE', "%$search%")->get();
        }else{
            $categories = Category::get();
        }

        return view('pemohon.category.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('pemohon.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'penanggung_perusahaan' => 'required|max:255|string',
            'no_telp' => 'required',
            'alamat_perusahaan' => 'required|max:255|string',
            'kordinat' => 'required|max:255|string',
            'npwp' => 'required',
            'nib' => 'required',
            'is_active' => 'sometimes'
        ]);

        Category::create([
            'name' => $request->name,
            'penanggung_perusahaan' => $request->penanggung_perusahaan,
            'no_telp' => $request->no_telp,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'kordinat' => $request->kordinat,
            'nib' => $request->nib,
            'npwp' => $request->npwp,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect('categories/create')->with('status','Profil Perusahaan Berhasil Dibuat');
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('pemohon.category.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'penanggung_perusahaan' => 'required|max:255|string',
            'no_telp' => 'required',
            'alamat_perusahaan' => 'required|max:255|string',
            'kordinat' => 'required|max:255|string',
            'nib' => 'required',
            'npwp' => 'required',
            'is_active' => 'sometimes'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'penanggung_perusahaan' => $request->penanggung_perusahaan,
            'no_telp' => $request->no_telp,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'kordinat' => $request->kordinat,
            'nib' => $request->nib,
            'npwp' => $request->npwp,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect()->back()->with('status','Profil Perusahaan Berhasil Diupdate');
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $DataFile = DataFile::where('file_id', $id)->delete();
        $category->delete();
        return redirect()->back()->with('status','Profil Perusahaan Berhasil Dihapus');
    }

    public function addComment(Request $request, int $fileId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $file = DataFile::findOrFail($fileId);
        $file->update(['comment' => $request->comment]);

        return redirect()->back()->with('status', 'Comment added successfully');
    }

    public function exportPDF($id)
    {
        // Fetch the specific category by ID
        $category = Category::findOrFail($id);

        // Generate the PDF from a view
        $pdf = Pdf::loadView('pdf.category', compact('category'));

        // Return the PDF for download
        return $pdf->download('category-' . $category->id . '.pdf');
    }

    public function exportSingleCategory($id)
    {
        // Fetch the category by ID
        $category = Category::findOrFail($id);

        // Generate the PDF from the view
        $pdf = Pdf::loadView('pdf.category', compact('category'));

        // Return the generated PDF as a download
        return $pdf->download('category_'.$category->id.'.pdf');
    }

    public function downloadAllCategories()
    {
        // Fetch all categories
        $categories = Category::all();

        // Generate the PDF from a view and pass the categories to the view
        $pdf = Pdf::loadView('pdf.categories', compact('categories'))
                  ->setPaper('a4', 'landscape'); // Set paper size to A4 and orientation to landscape

        // Return the PDF for download
        return $pdf->download('all_categories.pdf');
    }

}
