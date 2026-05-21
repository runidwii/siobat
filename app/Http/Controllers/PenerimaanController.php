<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerimaan;
use App\Models\Obat;

class PenerimaanController extends Controller
{
    /**
     * Menampilkan data penerimaan
     */
    public function index()
    {
        $penerimaan = Penerimaan::with('obat')->get();

        return view('penerimaan.index', compact('penerimaan'));
    }

    /**
     * Menampilkan form tambah penerimaan
     */
    public function create()
    {
        $obat = Obat::all();

        return view('penerimaan.create', compact('obat'));
    }

    /**
     * Menyimpan data penerimaan
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_obat' => 'required',

            'jumlah_masuk' => 'required|integer',

            'tanggal_masuk' => 'required|date'
        ]);

        /**
         * Simpan data penerimaan
         */
        Penerimaan::create([

            'id_obat' => $request->id_obat,

            'jumlah_masuk' => $request->jumlah_masuk,

            'tanggal_masuk' => $request->tanggal_masuk
        ]);

        /**
         * Update stok obat
         */
        $obat = Obat::find($request->id_obat);

        $obat->update([

            'stok_terkini' =>
                $obat->stok_terkini + $request->jumlah_masuk
        ]);

        return redirect('/penerimaan');
    }

    /**
     * Detail penerimaan
     */
    public function show($id)
    {
        $penerimaan = Penerimaan::with('obat')
                        ->findOrFail($id);

        return view('penerimaan.show', compact('penerimaan'));
    }

    /**
     * Hapus data penerimaan
     */
    public function destroy($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);

        /**
         * Kurangi stok saat data dihapus
         */
        $obat = Obat::find($penerimaan->id_obat);

        $obat->update([

            'stok_terkini' =>
                $obat->stok_terkini - $penerimaan->jumlah_masuk
        ]);

        $penerimaan->delete();

        return redirect('/penerimaan');
    }
}
