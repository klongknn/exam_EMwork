<?php
date_default_timezone_set("Asia/Bangkok");


$a = 0;
$b = 1;

echo "c = ", $a + $b;
echo '<div><b>', ($a + $b),'</b></div>';

echo date_default_timezone_get();
echo '<br />';
echo date("Y-m-t H:i:s");

$current_date = date("Y-m-d");

echo '<br />';

$start_date = date_th(date("Y-m-d"));
echo $start_date;
echo '<br />';
echo date_en($start_date);

function date_th($date) {
    $date_array = explode('-', $date);
    $th_date = $date_array[2] .
     '/' . $date_array[1] . '/' .
      ($date_array[0] + 543);

      return $th_date;
}

function date_en($date) {
    $date_array = explode('/', $date);
    $en_date = ($date_array[2] - 543) . '-' . 
    $date_array[1] . '-' . $date_array[0];
    return $en_date;
}