@extends('layouts.dashboard')

@section('judul')
  <h1 class="h3 mb-4 text-gray-800">Mahasiswa</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Detail</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <div class="row">
      <div class="col-md-3 text-md-right">
        <h5>Nama :</h5>
      </div>
      <div class="col">
        <label>{{ $detail_mahasiswa->nama }}</label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 text-md-right">
        <h5>Umur :</h5>
      </div>
      <div class="col">
        <label>{{ $detail_mahasiswa->umur }}</label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 text-md-right">
        <h5>Jenis Kelamin :</h5>
      </div>
      <div class="col">
        <label>{{ $detail_mahasiswa->jenkel }}</label>
      </div>
    </div>

  </div>
</div>
@endsection