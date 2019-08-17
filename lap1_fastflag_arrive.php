<?php
    require_once("pdo.php");
    require_once("time_difference.php");
    $checkpointno = 3;
    $racerno = $_GET['racerno'];
    $t = microtime(true);
    $micro = floor(sprintf("%06d",(($t -floor($t))*1000000))/1000);
    $arrival = (date("H:i:s",time()).".".$micro);
    if(isset($_GET['arrival']))$depart = $_GET['arrival'];
    $CHECK_RACE_DATA = "SELECT COUNT(*) FROM racerdata WHERE racerno =$racerno AND checkpointno = $checkpointno";
    $CHECK_PRE_DEPT = "SELECT departure FROM racerdata WHERE racerno =$racerno AND checkpointno = ($checkpointno-1)";
    $CHECK_RANK_LIST = "SELECT COUNT(*) FROM ranklist WHERE racerno =$racerno AND checkpoint = $checkpointno";
    $checkcheckpoint =($pdo->query($CHECK_RANK_LIST)->fetch(PDO::FETCH_ASSOC));
    $checkracedata = ($pdo->query($CHECK_RACE_DATA)->fetch(PDO::FETCH_ASSOC));
    $checkpredept = ($pdo->query($CHECK_PRE_DEPT)->fetch(PDO::FETCH_ASSOC));
    $query  = "INSERT INTO `racerdata` (`racerno`, `checkpointno`, `arrival`) VALUES($racerno,$checkpointno,'$arrival')";
    $query2  = "INSERT INTO `racerdata` (`racerno`, `checkpointno`, `arrival`) VALUES($racerno,($checkpointno+1),'$arrival')";
    
    if(is_null($checkpredept['departure']))
    {
        die("Racer not Departed from previous stop");
        // $_SESSION['redirect']="checkpoint.php";
        // $_SESSION['refresh']=1000;
        // header("Location:message1.php");
        // return;
    }
    if($checkcheckpoint['COUNT(*)']>0||$checkracedata['COUNT(*)']>0)
    {
        die("Entry Already Made");
        // $_SESSION['redirect']="checkpoint.php";
        // $_SESSION['refresh']=1000;
        // header("Location:message1.php");
        // return;
    }
    $insertdata = $pdo->query($query);
    $insertdata2 = $pdo->query($query2);
    header("Location:lap1_FF.php");
    $BEETOWNDEPART = "SELECT departure FROM racerdata WHERE racerno = $racerno AND  checkpointno = ($checkpointno-1)";
    $fetchDepart = $pdo->query($BEETOWNDEPART);
    $fetchDepart = $fetchDepart->fetch(PDO::FETCH_ASSOC);
    $travelingTime = get_time_difference($arrival, explode(".",$fetchDepart['departure'])[0]); 
    //$penalty = calc_penalty($travelingTime,"00:20:00",60,10);
    $INSERT_RANK_LIST = "INSERT INTO ranklist (`racerno`,	`time`,	`penalty`,`total`	,`checkpoint`) values ('$racerno' , '$travelingTime','00:00:00','$travelingTime','$checkpointno') ";
    // echo $INSERT_RANK_LIST;
    $insert_rank = $pdo->query($INSERT_RANK_LIST);
?>