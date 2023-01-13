<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Universitas;
use App\Models\Mahasiswa;

class UniversitasController extends Controller
{
    public function index()
    {
        $data_universitas = Universitas::with('mahasiswa')->get();

        return view('universitas.index', compact('data_universitas'));
    }

    public function tambah()
    {
        $data_mahasiswa = Mahasiswa::all();

        return view('universitas.create', compact('data_mahasiswa'));
    }


    public function proses_tambah(Request $request)
    {

        // Aturan Validasi
        $rule_validasi = [
            'fakultas'         => 'required|min:3',
            'jurusan'         => 'required|min:3',
            'angkatan'      => 'required|numeric',
            'mahasiswa_ke'   => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'fakultas.required'        => 'Fakultas Harus di Isi !',
            'fakultas.min'             => 'Fakultas Minimal 3 Karakter !',

            'jurusan.required'        => 'Jurusan Harus di Isi !',
            'jurusan.min'             => 'Jurusan Minimal 3 Karakter !',

            'angkatan.required'     => 'Angkatan Harus di Isi',
            'angkatan.numeric'      => 'Angkatan Harus Berupa Angka',
            'mahasiswa_ke.required'  => 'Mahasiswa Harus di Isi',
            
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = new Universitas();
        $data_to_save->fakultas        = $request->fakultas;
        $data_to_save->jurusan        = $request->jurusan;
        $data_to_save->angkatan     = $request->angkatan;
        $data_to_save->mahasiswa_id  = $request->mahasiswa_ke;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan ');
    }

    public function detail($id)
    {
        $detail_universitas = Universitas::findOrFail($id);

        return view('universitas.detail', compact('detail_universitas'));
    }

    public function hapus($id)
    {
        $detail_universitas = Universitas::findOrFail($id);

        $detail_universitas->delete();

        return back()->with('status', 'Data Berhasil di Hapus ');
    }

    public function ubah($id)
    {
        $detail_universitas = Universitas::findOrFail($id);
        $data_mahasiswa = Mahasiswa::all();

        return view('universitas.edit', compact('detail_universitas', 'data_mahasiswa'));
    }

    public function proses_ubah(Request $request, $id)
    {

        // Aturan Validasi
        $rule_validasi = [
            'fakultas'         => 'required|min:3',
            'jurusan'         => 'required|min:3',
            'angkatan'      => 'required|numeric',
            'mahasiswa_ke'   => 'required',
        ];

        // Custom Message
        $pesan_validasi = [
            'fakultas.required'        => 'Fakultas Harus di Isi !',
            'fakultas.min'             => 'Fakultas Minimal 3 Karakter !',

            'jurusan.required'        => 'Jurusan Harus di Isi !',
            'jurusan.min'             => 'Jurusan Minimal 3 Karakter !',

            'angkatan.required'     => 'Angkatan Harus di Isi',
            'angkatan.numeric'      => 'Angkatan Harus Berupa Angka',
            'mahasiswa_ke.required'  => 'Mahasiswa Harus di Isi',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = Universitas::findOrFail($id);
        $data_to_save->fakultas        = $request->fakultas;
        $data_to_save->jurusan        = $request->jurusan;
        $data_to_save->angkatan     = $request->angkatan;
        $data_to_save->mahasiswa_id  = $request->mahasiswa_ke;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Update Data Berhasil !');
    }

}