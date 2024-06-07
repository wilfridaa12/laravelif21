<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); //select*mahasiswa
        return view('mahasiswa.index')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        $kota = Kota::all();
        return view('mahasiswa.create')
            ->with('prodi', $prodi)
            ->with('kota', $kota);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //validasi
        $val = $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kota_id' => 'required',
            'prodi_id' => 'required',
            'url_foto' => 'required|file|image|mimes:png,jpg|max:5000'
        ]);
        
        //ambil ektensi file
        $ext = $request->url_foto->getClientOriginalExtension(); //png/jpg
        //rename file, misalnya: 2327250005.png
        $val['url_foto'] = $request->npm . '.' . $ext;
        //upload file bisa pakai move(). storeAs()
        $request->url_foto->move('foto', $val['url_foto']);
        // foto: folder tujuan public/foto

        Mahasiswa::create($val);
        return redirect()->route('mahasiswa.index')->with('success', $val['nama'] . ' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        $prodi = Prodi::all();
        $kota = Kota::all();
        return view('mahasiswa.edit')
            ->with('prodi', $prodi)
            ->with('kota', $kota)
            ->with('mahasiswa', $mahasiswa);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        if ($request->hasFile('url_foto')) {
            //hapus file lama
            FacadesFile::delete('foto/' . $mahasiswa['url_foto']);
            //validasi data input
            $val = $request->validate([
                'npm' => 'required',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kota_id' => 'required',
                'prodi_id' => 'required',
                'url_foto' => 'required|file|image|mimes:png,jpg|max:5000'
            ]);
            //ambil ektensi file
            $ext = $request->url_foto->getClientOriginalExtension(); //png/jpg
            //rename file, misalnya: 2327250005.png
            $val['url_foto'] = $request->npm . '.' . $ext;
            //upload file bisa pakai move(). storeAs()
            $request->url_foto->move('foto', $val['url_foto']);
            // foto: folder tujuan public/foto
        } else {
            //validasi data input
            $val = $request->validate([
                'npm' => 'required',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kota_id' => 'required',
                'prodi_id' => 'required',
            ]);
        }
        //ubah data mahasiswa
        //update data
        $mahasiswa->update($val);
        //redirect ke route mahasiswa.index
        return redirect()->route('mahasiswa.index')->with('success', $val['nama'] . ' Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //dd($mahasiswa);
        FacadesFile::delete('foto/' . $mahasiswa['url_foto']);//file dihapus
        $mahasiswa->delete();//data mahasiswa dihapus
        return redirect()->route('mahasiswa.index')->with('success', $mahasiswa->nama . ' Berhasil Dihapus');
    }
}
