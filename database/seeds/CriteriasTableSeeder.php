<?php

use Illuminate\Database\Seeder;
use App\Criteria;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'code' => 'C1',
            'name' => 'IPK',
            'weight' => 0.3,
            'character'  =>  'Benefit',
            'information'  =>  'Melampirkan Scan Trankrip Nilai!',
            'status'  =>  1,
        ]);
        Criteria::create([
            'code' => 'C2',
            'name' => 'Gaji Orang Tua',
            'weight' => 0.23,
            'character'  =>  'Cost',
            'information'  =>  'Melampirkan Scan Keterangan Penghasilan Orang Tua!',
            'status'  =>  1,
        ]);
        Criteria::create([
            'code' => 'C3',
            'name' => 'Tanggungan Orang Tua',
            'weight' => 0.22,
            'character'  =>  'Benefit',
            'information'  =>  'Melampirkan Scan Kartu Keluarga!',
            'status'  =>  1,
        ]);
        Criteria::create([
                'code' => 'C4',
                'name' => 'Prestasi / Organisasi',
                'weight' => 0.25,
                'character'  =>  'Benefit',
                'information'  =>  'Melampirkan Scan Sertifikat Prestasi atau Keanggotaan Organisasi!',
                'status'  =>  1,
        ]);
        Criteria::create([
            'code' => 'C5',
            'name' => 'Surat Permohonan',
            'character'  =>  '-',
            'information'  =>  'Surat Permohonan Ditujukan Kepada Wadir 3 Berupa Tulis Tangan. File Harus JPEG / PDF!',
            'status'  =>  0,
        ]);
        Criteria::create([
            'code' => 'C6',
            'name' => 'Scan KTM',
            'character'  =>  '-',
            'information'  =>  'Scan Kartu Tanda Mahasiswa. File Harus JPEG / PDF!',
            'status'  =>  0,
        ]);
        Criteria::create([
            'code' => 'C7',
            'name' => 'Scan Surat Pernyataan',
            'character'  =>  '-',
            'information'  =>  'Scan Surat Pernyataan Tidak Menerima Beasiswa. File Harus JPEG / PDF!',
            'status'  =>  0,
        ]);
        Criteria::create([
            'code' => 'C8',
            'name' => 'Scan Surat Rekomendasi Jurusan',
            'character'  =>  '-',
            'information'  =>  'Scan Surat Rekomendasi Dari Jurusan. File Harus JPEG / PDF!',
            'status'  =>  0,
        ]);
        Criteria::create([
            'code' => 'C9',
            'name' => 'Scan KTP Orang Tua',
            'character'  =>  '-',
            'information'  =>  'Scan KTP Kedua Orang Tua. File Harus JPEG / PDF!',
            'status'  =>  0,
        ]);
        Criteria::create([
            'code' => 'C10',
            'name' => 'Scan Surat Keterangan Tidak Mampu',
            'character'  =>  '-',
            'information'  =>  'Scan Surat Keterangan Tidak Mampu. File Harus JPEG / PDF!',
            'status'  =>  0,
        ]);
    }
}
