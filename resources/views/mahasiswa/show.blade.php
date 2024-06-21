@extends('layout.main')

@section('title', 'Daftar Mahasiswa')

@section('content')

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <table class="table">
      <tr>
        <td>NPM</td>
        <td>{{$mahasiswa['npm']}}</td>
      </tr>
      <tr>
        <td>Nama Mahasiwa</td>
        <td>{{$mahasiswa['nama']}}</td>
      </tr>
      <tr>
        <td>Program studi</td>
        <td>{{$mahasiswa['prodi']['nama']}}</td>
      </tr>
      <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>{{$mahasiswa['tempat_lahir']}}, {{$mahasiswa['tanggal_lahir']}}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>{{$mahasiswa['alamat']}}</td>
      </tr>
      <tr>
        <td>Kota</td>
        <td>{{$mahasiswa['kota']['nama']}}</td>
      </tr>
    </table>
  
   
      </div>
  </div>
</div>
@endsection