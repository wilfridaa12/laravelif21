@extends('layout.main')

@section('title', 'Daftar Fakultas')

@section('content')
<h2>Daftar fakultas</h2>
<p>ini halaman daftar fakultas</p>
@foreach ($fakultas as $item) 
{{$item['nama']}} {{$item['singkatan']}}
<br>
@endforeach
@endsection 
{{-- end sec untuk lebih dr satu baris --}}