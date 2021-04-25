<?php
function values($value, $idPeriod)
{            
    if($value->period_id == $idPeriod && $value->criteria->status == 1){
        return($value->value);
    }
}