<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminProdukController extends Controller
{
    public function index(Request $request)
    {
        $data['produk'] = Produk::orderBy('nama', 'ASC')->get();
        $data['kategori'] = Kategori::orderBy('nama', 'ASC')->get();

        confirmDelete('Hapus Produk', 'Apakah kamu yakin ingin menghapus produk?');
        return view('admin.kelola.produk.index')->with($data);
    }

    public function store(Request $request, $id = null)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|file|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kategori = Kategori::find($request->kategori_id);
        if (!$kategori) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan');
        }

        $input = $request->all();
        $input['kode'] = Str::random(8);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $storedFile = $file->storeAs('produk/gambar', $file->hashName());
            $input['gambar'] = $storedFile;
        }

        Produk::updateOrCreate(['id' => $id], $input);

        return redirect()->back()->with('success', 'Produk berhasil disimpan');
    }

    public function dataById($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json($produk);
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
