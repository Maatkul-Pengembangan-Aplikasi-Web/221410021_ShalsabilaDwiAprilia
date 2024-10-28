<?php

namespace App\Http\Controllers;
use App\Models\Prodi;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
{
    $prodis = Prodi::orderBy('id', 'desc')->get();
    return view('prodi.index', compact('prodis'));
}

public function create()
{
    return view('prodi.create');
}

public function save(Request $request)
{
    $request->validate([
        'nama' => 'required'
    ]);

    Prodi::create([
        'nama' => $request->nama
    ]);

    return redirect()->route('/prodi')->with('success', 'Program Studi berhasil ditambahkan');
}
}
