<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    /**
     * Tampilkan semua data pemakaian
     */
    public function index()
    {
        $data = Pemakaian::with(['obat', 'pengguna'])->get();

        return response()->json([
            'message' => 'Data pemakaian berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Simpan data pemakaian baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_resep' => 'required|integer',
            'id_obat' => 'required|exists:obats,id_obat',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'id_pengguna' => 'required|exists:users,id',
        ]);

        $pemakaian = Pemakaian::create($request->all());

        return response()->json([
            'message' => 'Data pemakaian berhasil ditambahkan',
            'data' => $pemakaian
        ], 201);
    }

    /**
     * Tampilkan 1 data
     */
    public function show($id)
    {
        $pemakaian = Pemakaian::with(['obat', 'pengguna'])
            ->findOrFail($id);

        return response()->json([
            'message' => 'Data ditemukan',
            'data' => $pemakaian
        ]);
    }

    /**
     * Update data pemakaian
     */
    public function update(Request $request, $id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        $request->validate([
            'id_resep' => 'sometimes|integer',
            'id_obat' => 'sometimes|exists:obats,id_obat',
            'jumlah_keluar' => 'sometimes|integer|min:1',
            'tanggal_keluar' => 'sometimes|date',
            'id_pengguna' => 'sometimes|exists:users,id',
        ]);

        $pemakaian->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $pemakaian
        ]);
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        $pemakaian->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}