<?php
function analisis($values, $period_id, $user_periods, $criterias_count)
{            
    $hasil = array();
    foreach($user_periods as $row) {
        foreach($row->user->mahasiswa->values as $value) {
            if($value->period_id == $period_id && $value->criteria->status == 1)
            {
                if($value->criteria->character == 'Cost')
                {
                    $minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
                    $cost = $minimum / $value->value;
                    $nilai = $cost * $value->criteria->weight;
                    array_push($hasil,$nilai);
                } else {
                    $maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray()));
                    $benefit = $value->value / $maximum;
                    $nilai = $benefit * $value->criteria->weight;              
                    array_push($hasil,$nilai);
                }
            }
        }
    }

    $nama = array();
    $np = array();
    foreach($user_periods as $row){
        array_push($nama,$row->user->mahasiswa->name);
        array_push($nama, prodi($row->user->mahasiswa->prodi));
        $coba = array_chunk($nama, 2);
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