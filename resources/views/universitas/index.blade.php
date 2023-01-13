@extends('layouts.dashboard')

@section('judul')
  <h1 class="h3 mb-4 text-gray-800">Universitas</h1>
@endsection

@section('konten')
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
  </div>

  <div class="card-body">

    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <a href="{{ route('get.tambah.universitas') }}" class="btn btn-dark btn-icon-split">
      <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Data</span>
    </a>

    <hr>

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Fakultas</th>
              <th>Jurusan</th>
              <th>Angkatan</th>
              <th>Mahasiswa</th>
              <th>Aksi</th>
            </tr>
        </thead>
          <tbody>
            @foreach($data_universitas as $universitas)
              <tr>
                <td>{{ $universitas->id }}</td>
                <td>{{ $universitas->fakultas }}</td>
                <td>{{ $universitas->jurusan }}</td>
                <td>{{ $universitas->angkatan }}</td>
                <td>{{ $universitas->mahasiswa->nama }}</td>
                <td class="text-nowrap">
                  <!-- Detail -->
                  <a href="{{ route('get.detail.universitas', $universitas->id) }}" class="btn btn-dark" > 
                    <i class="fa fa-eye"></i>
                  </a>

                  <!-- Ubah -->
                  <a href="{{ route('get.ubah.universitas', $universitas->id) }}" class="btn btn-dark" > 
                    <i class="fa fa-edit"></i>
                  </a>

                  <!-- Delete -->
                  <form hidden action="{{ route('delete.universitas', $universitas->id)}}" method="post" id="data-ke-{{ $universitas->id }}">
                    @csrf
                    @method('DELETE')
                    &nbsp;
                  </form>

                  <button class="btn btn-dark" onclick="deleteRow( {{ $universitas->id }} )">
                    <i class="fas fa-trash"></i>
                  </button>

                  
                  &nbsp;

                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
  </div>
  </div>
</div>
@endsection

@push('scripts')
<!-- Add SweetAlert 2 CDN -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Delete Row -->
<script>
  function deleteRow(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#data-ke-'+id).submit()
      }
    })
  }
</script>

@endpush