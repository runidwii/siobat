<?php

namespace App\Http\Controllers;

use App\Models\ObatSampah;
use Illuminate\Http\Request;

class ObatSampahController extends Controller
{
    /**
     * Ambil semua data
     */
    public function index()
    {
        $data = ObatSampah::with(['obat', 'pengguna'])->latest()->get();

        return response()->json([
            'message' => 'Data obat sampah berhasil diambil',
            'data' => $data
        ]);
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:obats,id_obat',
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'required|in:kadaluarsa,rusak,lainnya',
            'tanggal_dibuang' => 'required|date',
            'id_pengguna' => 'required|exists:users,id',
        ]);

        $data = ObatSampah::create($request->all());

        return response()->json([
            'message' => 'Data obat sampah berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    /**
     * Detail 1 data
     */
    public function show($id)
    {
        $data = ObatSampah::with(['obat', 'pengguna'])
            ->findOrFail($id);

        return response()->json([
            'message' => 'Data ditemukan',
            'data' => $data
        ]);
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        $data = ObatSampah::findOrFail($id);

        $request->validate([
            'id_obat' => 'sometimes|exists:obats,id_obat',
            'jumlah' => 'sometimes|integer|min:1',
            'alasan' => 'sometimes|in:kadaluarsa,rusak,lainnya',
            'tanggal_dibuang' => 'sometimes|date',
            'id_pengguna' => 'sometimes|exists:users,id',
        ]);

        $data->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ]);
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        $data = ObatSampah::findOrFail($id);
        $data->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}