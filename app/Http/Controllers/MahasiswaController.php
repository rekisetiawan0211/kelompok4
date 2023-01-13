<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{

    public function index()
    {
        $data_mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('data_mahasiswa'));
    }

    public function tambah()
    {
        return view('mahasiswa.create');
    }


    public function proses_tambah(Request $request)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'         => 'required|min:3',
            'umur'       => 'required|numeric',
            'jenkel'       => 'required|min:3',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'umur.required'        => 'Umur Harus di Isi !',
            'umur.numeric'         => 'Umur Harus Berupa Angka',

            'jenkel.required'        => 'Jenis Kelamin Harus di Isi !',
            'jenkel.min'             => 'Jenis Kelamin Minimal 3 Karakter !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = new Mahasiswa();
        $data_to_save->nama         = $request->nama;
        $data_to_save->umur       = $request->umur;
        $data_to_save->jenkel       = $request->jenkel;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan !');
    }

    public function detail($id)
    {
        $detail_mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.detail', compact('detail_mahasiswa'));
    }

    public function hapus($id)
    {
        $detail_mahasiswa = Mahasiswa::findOrFail($id);

        if ($detail_mahasiswa->universitas()->exists()){
            return back()->with('status', 'Tidak Bisa Dihaapus Karena Data Ber-Relasi');
        }

        $detail_mahasiswa->delete();

        return back()->with('status', 'Data Berhasil di Hapus ');
    }

    public function ubah($id)
    {
        $detail_mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('detail_mahasiswa'));
    }

    public function proses_ubah(Request $request, $id)
    {

        // Aturan Validasi
        $rule_validasi = [
            'nama'         => 'required|min:3',
            'umur'       => 'required|numeric',
            'jenkel'       => 'required|min:3',
        ];

        // Custom Message
        $pesan_validasi = [
            'nama.required'        => 'Nama Harus di Isi !',
            'nama.min'             => 'Nama Minimal 3 Karakter !',

            'umur.required'        => 'Umur Harus di Isi !',
            'umur.numeric'         => 'Umur Harus Berupa Angka',

            'jenkel.required'        => 'Jenis Kelamin Harus di Isi !',
            'jenkel.min'             => 'Jenis Kelamin Minimal 3 Karakter !',
        ];

        // Lakukan Validasi
        $request->validate($rule_validasi, $pesan_validasi);

        // Mapping All Request 
        $data_to_save               = Mahasiswa::findOrFail($id);
        $data_to_save->nama         = $request->nama;
        $data_to_save->umur       = $request->umur;
        $data_to_save->jenkel       = $request->jenkel;

        // Save to DB
        $data_to_save->save();

        // Kembali dengan Flash Session Data
        return back()->with('status', 'Data Telah Disimpan ');
    }

}