<?php

$birthdate = '19-09-1997';
echo 'Born on : '.$birthdate;

function CalAge($birthdate){
  $today = date('d-m-Y');
    list($bday,$bmonth,$byear) = explode('-',$birthdate);
    list($tday,$tmonth,$tyear) = explode('-',$today);

    if($byear < 1970){
      $yearad = 1970 - $byear;
      $byear = 1970;
    }else{
      $yearad = 0;
    }

    $mbirth = mktime(0,0,0, $bmonth,$bday,$byear);
    $mtoday = mktime(0,0,0, $tmonth,$tday,$tyear);

    $mage = ($mtoday - $mbirth);
    $wyear = (date('Y', $mage)-1970+$yearad);
    $wmonth = (date('m', $mage)-1);
    $wday = (date('d', $mage)-1);

    $ystr = ($wyear > 1 ? " Years" : " Year");
    $mstr = ($wmonth > 1 ? " Months" : " Month");
    $dstr = ($wday > 1 ? " Days" : " Days");

    if($wyear > 0 && $wmonth > 0 && $wday > 0) {
      $agestr = $wyear.$ystr." ".$wmonth.$mstr." ".$wday.$dstr;
     }else if($wyear == 0 && $wmonth == 0 && $wday > 0) {
       $agestr = $wday.$dstr;
     }else if($wyear > 0 && $wmonth > 0 && $wday == 0) {
       $agestr = $wyear.$ystr." ".$wmonth.$mstr;
     }else if($wyear == 0 && $wmonth > 0 && $wday > 0) {
       $agestr = $wmonth.$mstr." ".$wday.$dstr;
     }else if($wyear > 0 && $wmonth == 0 && $wday > 0) {
       $agestr = $wyear.$ystr." ".$wday.$dstr;
     }else if($wyear == 0 && $wmonth > 0 && $wday == 0) {
       $agestr = $wmonth.$mstr;
     }else {
       $agestr ="";
     }

      return $agestr;
    }

echo '<br>Today your age is : '.Calage($birthdate);

?>