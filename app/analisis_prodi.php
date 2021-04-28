<?php
function analisis_prodi($values, $mahasiswas, $criterias_count)
{            
    $hasil = array();
    foreach($mahasiswas as $row) {
        foreach($row->values as $value) {
            if($value->criteria->status == 1)
            {
                if($value->criteria->character == 'Cost')
                {
                    $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
                    // dd($values->where('criteria_id', $value->criteria_id));
                    // dd($values->where('criteria_id', $value->criteria_id));
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

    // dd($hasil);

    $nama = array();
    $np = array();
    foreach($mahasiswas as $row){
        array_push($nama, $row->user->npm);
        array_push($nama, $row->name);
        array_push($nama, $row->prodi->name);
        $coba = array_chunk($nama, 3);
        foreach($coba as $cob){
            $co = implode(" - ",$cob);  
        }
        array_push($np,$co);
    }

    $nilai = array();
    $result = array_chunk($hasil, $criterias_count);
    foreach($result as $r) {
        $hasil_pembobotan = array_sum($r);
        array_push($nilai,$hasil_pembobotan);
    }
    $hasil = array_combine($np,$nilai);
    return $hasil;
}