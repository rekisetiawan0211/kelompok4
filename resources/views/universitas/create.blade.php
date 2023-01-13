@extends('layouts.dashboard')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('judul')
  <h1 class="h3 mb-4 text-gray-800">Universitas</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Create</h6>
  </div>

  <div class="card-body">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
    
    <form action="{{ route('post.proses-tambah.universitas') }}" method="post">
      @csrf

      <div class="form-group row">
        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas', '') }}">

          @error('fakultas')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan', '') }}">

          @error('jurusan')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>

        <div class="col-sm-10">
          <input type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan', '') }}">

          @error('angkatan')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>

      <div class="form-group row">
        <label for="mahasiswa" class="col-sm-2 col-form-label">Mahasiswa</label>

        <div class="col-sm-10">
          <select class="mahasiswa-id form-control custom-select" name="mahasiswa_ke">
            <option value="">Pilih Opsi</option>
            @foreach($data_mahasiswa as $mahasiswa)
              <option value="{{ $mahasiswa->id }}" {{ old('mahasiswa_id') == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nama }}</option>
            @endforeach
          </select>

          @error('mahasiswa_ke')
            <div class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
        </div>
        
      </div>


      <button type="submit" class="btn btn-success">
        Simpan
      </button>

    </form>

  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.mahasiswa-id').select2();
  });
</script>
@endpush