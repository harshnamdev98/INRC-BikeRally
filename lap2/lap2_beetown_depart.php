<?php
    require_once("pdo.php");
    $checkpointno = 6;
    $racerno = $_GET['racerno'];
    $arrival = "00:00:00";
    $t = microtime(true);
    $micro = floor(sprintf("%06d",(($t -floor($t))*1000000))/1000);
    $depart = (date("H:i:s",time()).".".$micro);  
    $query  = "INSERT INTO `racerdata` (`racerno`, `checkpointno`, `arrival`) VALUES($racerno,($checkpointno),'$depart')";
    
    //echo $query;
    $query = $pdo->query($query);
    header("Location:lap2_HBT.php");
?>