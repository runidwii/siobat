<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permintaan;

use App\Models\Obat;

use App\Models\User;

class PermintaanController extends Controller
{
    /**
     * Menampilkan data permintaan
     */
    public function index()
    {
        $permintaan = Permintaan::with([
            'obat',
            'pengguna'
        ])->get();

        return view('permintaan.index', compact('permintaan'));
    }

    /**
     * Form tambah permintaan
     */
    public function create()
    {
        $obat = Obat::all();

        $pengguna = User::all();

        return view('permintaan.create', compact(
            'obat',
            'pengguna'
        ));
    }

    /**
     * Simpan data permintaan
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_obat' => 'required',

            'id_pengguna' => 'required',

            'jumlah_permintaan' => 'required|integer',

            'tanggal_permintaan' => 'required|date',

            'satuan' => 'required',

            'status_permintaan' => 'required'
        ]);

        Permintaan::create([

            'id_obat' => $request->id_obat,

            'id_pengguna' => $request->id_pengguna,

            'jumlah_permintaan' => $request->jumlah_permintaan,

            'tanggal_permintaan' => $request->tanggal_permintaan,

            'satuan' => $request->satuan,

            'keterangan' => $request->keterangan,

            'status_permintaan' => $request->status_permintaan
        ]);

        return redirect('/permintaan');
    }

    /**
     * Detail permintaan
     */
    public function show($id)
    {
        $permintaan = Permintaan::with([
            'obat',
            'pengguna'
        ])->findOrFail($id);

        return view('permintaan.show', compact('permintaan'));
    }

    /**
     * Edit data permintaan
     */
    public function edit($id)
    {
        $permintaan = Permintaan::findOrFail($id);

        $obat = Obat::all();

        $pengguna = User::all();

        return view('permintaan.edit', compact(
            'permintaan',
            'obat',
            'pengguna'
        ));
    }

    /**
     * Update data permintaan
     */
    public function update(Request $request, $id)
    {
        $permintaan = Permintaan::findOrFail($id);

        $permintaan->update([

            'id_obat' => $request->id_obat,

            'id_pengguna' => $request->id_pengguna,

            'jumlah_permintaan' => $request->jumlah_permintaan,

            'tanggal_permintaan' => $request->tanggal_permintaan,

            'satuan' => $request->satuan,

            'keterangan' => $request->keterangan,

            'status_permintaan' => $request->status_permintaan
        ]);

        return redirect('/permintaan');
    }

    /**
     * Hapus data permintaan
     */
    public function destroy($id)
    {
        $permintaan = Permintaan::findOrFail($id);

        $permintaan->delete();

        return redirect('/permintaan');
    }
}