<?php 

function color() {
    $rgbColor = array();
    foreach(array('r', 'g', 'b') as $color){
        $rgbColor[$color] = mt_rand(0, 255);
    }
    return $rgbColor;
}