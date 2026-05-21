<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    /**
     * Menampilkan data obat
     */
    public function index()
    {
        $obat = Obat::all();

        return view('obat.index', compact('obat'));
    }

    /**
     * Menampilkan form tambah obat
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Menyimpan data obat
     */
    public function store(Request $request)
    {
        Obat::create([

            'nama_obat' => $request->nama_obat,

            'kategori' => $request->kategori,

            'stok_terkini' => $request->stok_terkini,

            'minimal_stok' => $request->minimal_stok,

            'dosis' => $request->dosis,

            'tanggal_expired' => $request->tanggal_expired,

            'satuan' => $request->satuan

        ]);

        return redirect('/obat');
    }
}