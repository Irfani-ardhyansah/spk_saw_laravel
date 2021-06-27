<?php

use Illuminate\Database\Seeder;
use App\Prodi;

class ProdisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'name' => 'Mesin Otomotif',
            'total' => 45,
        ]);
        Prodi::create([
            'name' => 'Teknik Komputer Kontrol',
            'total' => 45,
        ]);
        Prodi::create([
            'name' => 'Teknik Listrik',
            'total' => 50,
        ]);
        Prodi::create([
            'name' => 'Teknik Perkeretaapian',
            'total' => 48,
        ]);
        Prodi::create([
            'name' => 'Komputer Akuntansi',
            'total' => 40,
        ]);
        Prodi::create([
            'name' => 'Akuntansi',
            'total' => 40,
        ]);
        Prodi::create([
            'name' => 'Administrasi Bisnis',
            'total' => 40,
        ]);
        Prodi::create([
            'name' => 'Bahasa Inggris',
            'total' => 40,
        ]);
        Prodi::create([
            'name' => 'Teknologi Informasi',
            'total' => 48,
        ]);
    }
}
