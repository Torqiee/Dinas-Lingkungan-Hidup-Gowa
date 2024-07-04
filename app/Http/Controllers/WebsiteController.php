<?php

namespace App\Http\Controllers;
use App\Models\Dokumentasi;
use App\Models\Footer;
use App\Models\Penanggung;
use App\Models\Pihak;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::get();
        $penanggung = Penanggung::get();
        $pihak = Pihak::get();
        $proker = ProgramKerja::get();
        return view('welcome', compact('dokumentasi', 'penanggung', 'pihak', 'proker'));
    }
}
