<?php
function values($value, $period_id)
{            
    if($value->period_id == $period_id && $value->criteria->status == 1){
        return($value->value);
    }
}