@extends('layout.main')

@section('title', 'Daftar Fakultas')

@section('content')

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Daftar Fakultas</h4>
      <p class="card-description">
       List Data Fakultas
      </p>
      <a href="{{url('fakultas/create')}}" type="button" class="btn btn-success btn-rounded btn-fw">Tambah</a>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nama Fakultas</th>
              <th>Singkatan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fakultas as $item)
            <tr>
              <td>{{$item['nama']}}</td>
              <td>{{$item['singkatan']}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
  Swal.fire({
    title: "Good Job",
    text: "{{session('success')}}",
    icon: "success"
  });
</script>
@endif
@endsection 
{{-- end sec untuk lebih dr satu baris --}}