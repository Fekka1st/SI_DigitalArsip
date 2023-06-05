<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subkategoriseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kategoris')->insert([
            'Nama_Kategori' => 'Mahasiswa IF semua angkatan',
            'Keterangan' => 'Berisi Dokumen Mahasiswa IF A'
        ], [
            'Nama_Kategori' => ' Berkas SK BPAK RENALDY ',
            'Keterangan' => 'Isinya berisi Sekumpulan Gambar Anak Kecil'
        ], [
            'Nama_Kategori' => 'Dokumen PKI',
            'Keterangan' => 'Berisi Sejarah PKI dan dalang G30S PKI'
        ]);
    }
}
