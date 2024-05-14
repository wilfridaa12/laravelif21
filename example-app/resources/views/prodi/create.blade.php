@extends('layout.main')

@section('title', 'Daftar Prodi')

@section('content')
<h2>Tambah Program Studi</h2>
<p>ini halaman tambah program studi</p>
<form action="{{ route('prodi.store')}}" method="post">
  @csrf
  Nama Prodi: <input type="text" name="nama" id="" value="{{old('nama')}}"> 
  @error('nama')
      {{$message}}
  @enderror
  <br>
  Nama Fakultas: 
  <select name="fakultas_id" id="">
    @foreach ($fakultas as $item)
        <option value="{{$item['id']}}">{{$item['nama']}}</option>
    @endforeach
  </select>
  @error('fakultas_id')
      {{$message}}
  @enderror
  <br>
  <button type="submit">Simpan</button>
  
</form>

@endsection 
{{-- end sec untuk lebih dr satu baris --}}