<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::orderBy('nama', 'ASC')->get();

        return view('admin.kelola.kategori.index')->with($data);
    }
}
