<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::orderBy('nama', 'ASC')->get();

        confirmDelete('Hapus Kategori', 'Apakah kamu yakin ingin menghapus kategori?');
        return view('admin.kelola.kategori.index')->with($data);
    }

    public function store(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|file|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $storedFile = $file->storeAs('kategori/icon', $file->hashName());
            $input['icon'] = $storedFile;
        }

        Kategori::updateOrCreate(['id' => $id], $input);

        return redirect()->back()->with('success', 'Kategori berhasil disimpan');
    }

    public function dataById($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json($kategori);
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }
}
