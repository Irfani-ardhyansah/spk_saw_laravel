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
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Teknik Komputer Kontrol',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Teknik Listrik',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Teknik Perkeretaapian',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Komputer Akuntansi',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Akuntantsi',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Administrasi Bisnis',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Bahasa Inggris',
            'total' => 100,
        ]);
        Prodi::create([
            'name' => 'Teknologi Informasi',
            'total' => 100,
        ]);
    }
}
