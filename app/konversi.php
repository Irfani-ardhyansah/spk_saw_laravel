<?php
function prodi($name)
{            
    if($name == "TI")
        $g="Teknologi Informasi";
    elseif($name == "Meto")
        $g="Mesin Otomotif";
    elseif($name == "TKK")
        $g="Teknik Komputer Kontrol";
    elseif($name == "Teklis")
        $g="Teknik Listrik";
    elseif($name == "Kereta")
        $g="Teknik Perkeretaapian";
    elseif($name == "Kompak")
        $g="Komputer Akuntansi";
    elseif($name == "Akuntansi")
        $g="Akuntansi";
    elseif($name == "Adbis")
        $g="Administrasi Bisnis";
    else
         $g="Bahasa Inggris";
    return $g;    
}