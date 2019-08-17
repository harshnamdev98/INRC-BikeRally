<?php
    require_once("pdo.php");
    $checkpointno = 1;
    $racerno = $_GET['racerno'];
    $arrival = "00:00:00";
    $t = microtime(true);
    $micro = floor(sprintf("%06d",(($t -floor($t))*1000000))/1000);
    $depart = (date("H:i:s",time()).".".$micro);
    if(isset($_GET['depart']))$depart = $_GET['depart'];  
    $query  = "UPDATE `racerdata` SET departure = '$depart' WHERE (racerno = $racerno AND checkpointno = $checkpointno)";
    echo $query;
    $query = $pdo->query($query);
    header("Location:lap1_HBT.php");
?>