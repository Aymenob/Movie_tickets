
<?php 
//Generate a timestamp using mt_rand.
$timestamp = mt_rand(1, time());

//Format that timestamp into a readable date string.
$randomDate = date("d  H", $timestamp);

//Print it out.
echo $randomDate;
shuffle($list);
var_dump($list) ?>