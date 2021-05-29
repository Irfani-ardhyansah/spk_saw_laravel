<?php
function analisis_prodi($values, $mahasiswas, $criterias_count)
{            
    // mendefinisikan variabel array
    $hasil = array();
    foreach($mahasiswas as $row) {
        foreach($row->values as $value) {
            //mengecek status kriteria
            if($value->criteria->status == 1)
            {
                // melakukkan perhitungan normalisasi
                if($value->criteria->character == 'Cost')
                {
                    $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
                    $cost = $minimum / $value->value;
                    $nilai = round($cost, 3) * $value->criteria->weight;
                    array_push($hasil,round($nilai, 3));
                } else {
                    $maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
                    $benefit = $value->value / $maximum;
                    $nilai = round($benefit, 3) * $value->criteria->weight;              
                    array_push($hasil,round($nilai, 3));
                }
            }
        }
    }

    // mendefinisikan variabel array
    $nama = array();
    // mendefinisikan variabel array
    $np = array();
    foreach($mahasiswas as $row){
        // memasukkan data kedalam array $nama
        array_push($nama, $row->user->npm);
        array_push($nama, $row->name);
        array_push($nama, $row->prodi->name);
        // memotong array
        $coba = array_chunk($nama, 3);
        foreach($coba as $cob){
            //memecah array menjadi text
            $co = implode(" - ",$cob);  
        }
        // memasukkan data dari variabel $co ke $np
        array_push($np,$co);
    }

    // mendefinisikan array
    $nilai = array();
    // memecah array $hasil berdasarkan criteria yang ada
    $result = array_chunk($hasil, $criterias_count);
    foreach($result as $r) {
        // melakukan penjumlahan dalam variabel $r
        $hasil_pembobotan = array_sum($r);
        // memasukkan data $hasil_pembobotan ke dalam vaiabel nilai
        array_push($nilai,$hasil_pembobotan);
    }
    // menggabungkan 2 array kedalam variabel $hasil
    $hasil = array_combine($np,$nilai);
    return $hasil;
}