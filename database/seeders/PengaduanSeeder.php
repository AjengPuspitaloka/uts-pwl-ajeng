<?php
namespace Database\Seeders;
use App\Models\Pengaduan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{

public function run()
{
    Pengaduan::create([
        'nama' => 'Ajeng',
        'isi' => 'Listrik padam di wilayah saya.'
    ]);
}
}
