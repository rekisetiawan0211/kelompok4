@extends('layouts.dashboard')

@section('judul')
  <h1 class="h3 mb-4 text-gray-800">Tentang</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Info</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
    
    <div class="col-md text-md-center">
    <h3>Tugas Web 2 Kelompok 4</h3><br>
    <h4>8020200215 Muhammad Satria Mubin</h4><br>
    <h4>8020200190 Reki Setiawan</h4><br>
    <h4>8020200246 Ririn Radika Putri</h4><br>
    <h4>8020200158 M.david Adrilyan</h4><br>
    <h4>8020200118 Muammar Khadafi</h4><br>
    <h4>8020200219 M. Reza Fahlevi</h4><br>
    <h3>Sekian Dan Terima Kasih</h3>
    </div>


  </div>
</div>
@endsection
