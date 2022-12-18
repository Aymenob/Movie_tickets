<?php
function create_time_range($start, $end, $interval,$returnTimeFormat) {
    $startTime = strtotime($start); 
    $endTime   = strtotime($end);
  

    $current   = time(); 
    $addTime   = strtotime('+'.$interval, $current); 
    $diff      = $addTime - $current;

    $times = array(); 
    while ($startTime + $diff < $endTime) { 
        $times[] = date($returnTimeFormat, $startTime); 
        $startTime += $diff; 
    } 
    $times[] = date($returnTimeFormat, $startTime); 
    return $times; 
}

function create_date_range($param4,$param5,$param6){
    $intr2=array("17","24");
    $param4=$intr2[0];
    $param5=$intr2[1];
    $d = range($param4, $param5,$param6);
    $d2=implode(',2022-12-', $d);
    $days='2022-12-'.$d2;
    
    $chars = explode(',',$days);
    return $chars;
    }
?>