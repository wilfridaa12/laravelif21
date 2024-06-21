@extends('layout.main')

@section('title', 'Daftar Prodi')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Prodi</h4>
        <p class="card-description">
          Formulir Tambah Prodi
        </p>
        <form class="forms-sample" action="{{ route('prodi.store')}}" method="post">
          @csrf
  
          <div class="form-group">
            <label for="nama">Nama Prodi</label>
            <input type="text" name="nama" id="" value="{{old('nama')}}" class="form-control" placeholder="Nama Prodi"> 
           @error('nama') 
           {{$message}}
           @enderror
          </div>
          <div class="form-group">
            <label for="singkatan">Nama Fakultas</label>
            <select name="fakultas_id" id="" class="form-control">
              @foreach ($fakultas as $item)
                  <option value="{{$item['id']}}">{{$item['nama']}}</option>
              @endforeach
            </select>
            @error('fakultas_id')
                {{$message}}
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="{{url('prodi')}}" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection 
{{-- end sec untuk lebih dr satu baris --}}