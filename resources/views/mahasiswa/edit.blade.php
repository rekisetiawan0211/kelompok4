@extends('layouts.dashboard')


@section('judul')
  <h1 class="h3 mb-4 text-gray-800">Mahasiswa</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">

  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Edit</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <form action="{{ route('post.proses-ubah.mahasiswa', $detail_mahasiswa->id) }}" method="post">
      @csrf
      @method('PATCH')

      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $detail_mahasiswa->nama) }}">

          @error('nama')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="umur" class="col-sm-2 col-form-label">Umur</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur', $detail_mahasiswa->umur) }}">

          @error('umur')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('jenkel') is-invalid @enderror" name="jenkel" value="{{ old('jenkel', $detail_mahasiswa->jenkel) }}">

          @error('jenkel')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>


      <button type="submit" class="btn btn-dark">
        Simpan
      </button>

    </form>
  </div>

</div>
@endsection