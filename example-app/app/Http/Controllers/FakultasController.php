<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all(); //select*fakultas
        return view('Fakultas.index')
        ->with('fakultas', $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Fakultas::class)) {
            // return redirect()->route('fakultas.index')->with('error', 'Anda tidak memiliki akses untuk menambah data');
            abort(403, 'Anda tidak memiliki akses untuk menambah data');
        }
        // dd($request);
        // validasi data input
        $val = $request->validate([
            'nama'=> 'required|unique:fakultas',
            'singkatan'=>'required'
        ]);
        // simpan kedalam tabel fakultas
        Fakultas::create($val);
        // redirect ke tabel fakultas
        return redirect()->route('fakultas.index')->with('success', $val['nama'] . ' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}
