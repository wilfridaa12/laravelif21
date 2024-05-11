@extends('layout.main')

@section('title', 'Daftar Fakultas')

@section('content')
<h2>Daftar Prodi</h2>
<p>ini halaman daftar prodi</p>
@foreach ($prodi as $item) 
{{$item['nama']}} | {{$item['fakultas']['nama']}} | 
{{$item['fakultas']['singkatan']}}<br>
<br>
@endforeach
@endsection 
{{-- end sec untuk lebih dr satu baris --}}