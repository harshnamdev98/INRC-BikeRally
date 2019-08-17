<?php
function get_time_difference($t1, $t2)
{
  if($t1>=$t2)
  {
    $t1 = strtotime($t1);
    $t2 = strtotime($t2);
    $hour = floor(($t1-$t2)/3600);
    $minute =floor(($t1-$t2)/60)%60;
    $second = ($t1-$t2)-($hour*3600+$minute*60);
    return (date("H:i:s",strtotime($hour.":".$minute.":".$second)));
  }
  else
  {
    $t12 = strtotime($t2);
    $t2 = strtotime($t1);
    $t1 = $t12;
    $hour = floor(($t1-$t2)/3600);
    $minute =floor(($t1-$t2)/60)%60;
    $second = ($t1-$t2)-($hour*3600+$minute*60);
    return (date("H:i:s",strtotime($hour.":".$minute.":".$second)));
  }
}
// function get_time_difference($t1,$t2)
// {
//     if($t1>$t2)
//     {
//     $t1 = explode(":", $t1);
//     $t2 = explode(":", $t2);
//     $first = ((int)$t1[0])*3600+(int)($t1[1])*60+(int)($t1[2]);
//     $second = ((int)$t2[0])*3600+(int)($t2[1])*60+(int)($t2[2]);
//     $diff = floor(($first - $second)/60);
//     $hour = floor(($diff)/60);
//     $minute =floor(($diff)/60)%60;
//     $second = ($diff)-($hour*3600+$minute*60);
//     $diff = $hour.":".$minute.":".$second;
//     return (date("H:i:s",strtotime($diff)));
//     }
//     else
//     {
//     $tt = explode(":", $t2);
//     $t2 = explode(":", $t1);
//     $t1 = $tt;
//     $first = ((int)$t1[0])*3600+(int)($t1[1])*60+(int)($t1[2]);
//     $second = ((int)$t2[0])*3600+(int)($t2[1])*60+(int)($t2[2]);
//     $diff = floor(($first - $second)/60);
//     $hour = floor(($diff)/60);
//     $minute =floor(($diff)/60)%60;
//     $second = ($diff)-($hour*3600+$minute*60);
//     $diff = $hour.":".$minute.":".$second;
//     return (date("H:i:s",strtotime($diff)));
//     }
// }
?>