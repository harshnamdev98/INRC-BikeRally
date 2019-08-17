<?php
    require_once("pdo.php");
    $checkpointno = 8+4;
    if(isset($_GET['racerno']))
    {
        $racerno = $_GET['racerno'];
        $t = microtime(true);
        $micro = floor(sprintf("%06d",(($t -floor($t))*1000000))/1000);
        $depart = (date("H:i:s",time()).".".$micro);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
        //Checking records
        $exists =$pdo->prepare("SELECT COUNT(*) FROM racerdata WHERE racerno=:racerno AND checkpointno = :checkpointno");
        $exists->execute(array(
          ':racerno'=>$racerno,
          ':checkpointno'=>$checkpointno                                                                                                                            
        ));
        $exists = $exists->fetch(PDO::FETCH_ASSOC);
        if($exists['COUNT(*)']==0)
        {
          die("Error: Racer not arrived at your checkpoint");
        //   $_SESSION['redirect']="checkpoint.php";
        //   $_SESSION['refresh']=1500;
        //   header("Location:message1.php");
        //   return;
        }
        $duplicate = $pdo->prepare("SELECT departure FROM racerdata WHERE racerno=:racerno AND checkpointno = :checkpointno");
        $duplicate->execute(array(
          ':racerno'=>$racerno,
          ':checkpointno'=>$checkpointno
        ));
        $duplicate = $duplicate->fetch(PDO::FETCH_ASSOC);
        if(!is_null($duplicate['departure']))
        {
          die("Entry Already Made");
        //   $_SESSION['redirect']="checkpoint.php";
        //   $_SESSION['refresh']=1000;
        //   header("Location:message1.php");
        //   return;
        }

        //Main Code
        $query  = "UPDATE `racerdata` SET departure = '$depart' WHERE racerno = $racerno AND checkpointno = $checkpointno";
        $quert = $pdo->query($query);
        header("Location:lap2_SS.php");

    }
?>