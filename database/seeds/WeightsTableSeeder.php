<?php

use Illuminate\Database\Seeder;
use App\Weight;
use App\Criteria;

class WeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bobot IPK
        Weight::create([
            'criteria_id' => Criteria::where('name', 'IPK')->first()->id,
            'information' => 'IPK < 2.75',
            'value' => 0,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'IPK')->first()->id,
            'information' => '3.00 < IPK <= 3.30',
            'value' => 0.25,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'IPK')->first()->id,
            'information' => '3.30 < IPK <= 3.60',
            'value' => 0.5,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'IPK')->first()->id,
            'information' => '3.60 < IPK <= 4.00',
            'value' => 0.75,
        ]);

        // Bobot Gaji Orang Tua
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Total Penghasilan Orang Tua')->first()->id,
            'information' => 'Gaji < 500.000',
            'value' => 1,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Total Penghasilan Orang Tua')->first()->id,
            'information' => '500.000 < Gaji <= 2.000.000',
            'value' => 0.75,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Total Penghasilan Orang Tua')->first()->id,
            'information' => '2.000.000 < Gaji <= 4.000.000',
            'value' => 0.5,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Total Penghasilan Orang Tua')->first()->id,
            'information' => '4.000.000 < Gaji <= 6.000.000',
            'value' => 0.25,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Total Penghasilan Orang Tua')->first()->id,
            'information' => 'Gaji > 6.000.000',
            'value' => 0,
        ]);
        
        // Bobot Gaji Orang Tua
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Tanggungan Orang Tua')->first()->id,
            'information' => '1 anak',
            'value' => 0,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Tanggungan Orang Tua')->first()->id,
            'information' => '2 anak',
            'value' => 0.25,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Tanggungan Orang Tua')->first()->id,
            'information' => '3 anak',
            'value' => 0.5,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Tanggungan Orang Tua')->first()->id,
            'information' => '4 anak',
            'value' => 0.75,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Tanggungan Orang Tua')->first()->id,
            'information' => '>= 5 anak',
            'value' => 1,
        ]);

        // Bobot Prestasi
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Prestasi / Organisasi')->first()->id,
            'information' => '3 <= prestasi / organisasi',
            'value' => 1,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Prestasi / Organisasi')->first()->id,
            'information' => 2,
            'value' => 0.75,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Prestasi / Organisasi')->first()->id,
            'information' => 1,
            'value' => 0.5,
        ]);
        Weight::create([
            'criteria_id' => Criteria::where('name', 'Prestasi / Organisasi')->first()->id,
            'information' => 'Tidak Ada',
            'value' => 0.25,
        ]);
    }
}
