<?php
    session_start();
    require_once('pdo.php');
    $RACER_SELECT ="SELECT racer.uid,racer.name, racerno,SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS time,SEC_TO_TIME(sum(TIME_TO_SEC(penalty))) AS pen,SEC_TO_TIME(SUM(TIME_TO_SEC(total))) AS tot,MAX(checkpoint) as maxc FROM ranklist INNER JOIN racer ON racer.uid = ranklist.racerno GROUP BY racerno ORDER BY maxc DESC,tot ASC,pen ASC";
    $rankdata = $pdo->query($RACER_SELECT);
?>



<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous">
</script>
<script> 
   $(function(){
   $("#header").load("header.html"); 
   $("#footer").load("footer.html"); 
   });
   document.title = "RANK LIST";
   
</script> 

<body style="padding-top:13vh;background-color:#F0F0F0;">
    <div id="header"></div>
    <div class="container-fluid container-fluid1">
        <div class="row row-content">
            <div class="col-sm-12 col-md-12 text-center">
                <div class="table-responsive">
            <!--CLASS 1A result start-->
                <h1 class=""><kbd>CLASS 1A Result</kbd></h1>
                <?php
                // $RACER_SELECT ="SELECT racer.uid,racer.name, racerno,SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS time,SEC_TO_TIME(sum(TIME_TO_SEC(penalty))) AS pen,SEC_TO_TIME(SUM(TIME_TO_SEC(total))) AS tot,MAX(checkpoint) as maxc FROM ranklist INNER JOIN racer ON racer.uid = ranklist.racerno GROUP BY racerno ORDER BY maxc DESC,tot ASC,pen ASC";

                 $class = $pdo->query("SELECT racer.uid,racer.name, racerno,SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS time,SEC_TO_TIME(sum(TIME_TO_SEC(penalty))) AS pen,SEC_TO_TIME(SUM(TIME_TO_SEC(total))) AS tot,MAX(checkpoint) as maxc FROM ranklist INNER JOIN racer ON racer.uid = ranklist.racerno AND racer.class='1a' GROUP BY racerno ORDER BY maxc DESC,tot ASC,pen ASC")?>
                    <table class="table table-bordered table-dark table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Checkpoint Crossed</th>
                                <th scope="col">COMP Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Travelling Time</th>
                                <th scope="col">Penalty Time</th>
                                <!-- <th scope="col">SS1 Time</th>
                                <th scope="col">SS2 Time</th> -->
                                <th scope="col">Total Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                while($data = $class->fetch(PDO::FETCH_ASSOC))
                                {
                                    // $FETCH_OTHER_QUERY = "SELECT * FROM ranklist WHERE racerno = ". $data['racerno'] ;
                                    // $fetch_other = $pdo->query($FETCH_OTHER_QUERY);
                                    // $transportTime="00:00:00"; 
                                    // $penaltyTime="00:00:00";
                                    // $ss1Time="00:00:00";
                                    // $ss2Time="00:00:00";
                                    // while($fetch_other2 = $fetch_other->fetch(PDO::FETCH_ASSOC))
                                    // {
                                    //     if($fetch_other2['checkpoint']==2)
                                    //     {
                                    //         $transportTime = $fetch_other2['time'];
                                    //         $penaltyTime =   $fetch_other2['penalty'];
                                    //     }
                                    //     if($fetch_other2['checkpoint']==3)
                                    //     {
                                    //         $ss1Time = $fetch_other2['time'];
                                    //     }
                                    //     if($fetch_other2['checkpoint']==4)
                                    //     {
                                    //         $ss2Time = $fetch_other2['time'];
                                    //     }
                                    // }
                                    echo '<tr class="table-light" style="color:black;">';
                                    echo '<th>'.$i.'</th>';
                                    echo '<td>'.$data['maxc'].'</td>';
                                    echo '<td>'.$data['racerno'].'</td>';
                                    echo '<td>'.$data['name'].'</td>';
                                    echo '<td>'.$data['time'].'</td>';
                                    echo '<td>'.$data['pen'].'</td>';
                                    // echo '<td>'.$ss1Time.'</td>';
                                    // echo '<td>'.$ss2Time.'</td>';
                                    echo '<td>'.$data['tot'].'</td>';
                                    echo '</tr>';
                                    $i+=1;
                                }
                            ?>
                            
                            </tbody>
                            </table>
                            <!--CLASS 1A ends-->
                            

                             <!--CLASS N result start-->
                             <?php
                             for ($n=1;$n<=9;$n++){?>
                <h1><kbd>CLASS <?php echo $n; ?> Result</kbd></h1>
                <?php
                // $RACER_SELECT ="SELECT racer.uid,racer.name, racerno,SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS time,SEC_TO_TIME(sum(TIME_TO_SEC(penalty))) AS pen,SEC_TO_TIME(SUM(TIME_TO_SEC(total))) AS tot,MAX(checkpoint) as maxc FROM ranklist INNER JOIN racer ON racer.uid = ranklist.racerno GROUP BY racerno ORDER BY maxc DESC,tot ASC,pen ASC";

                 $class = $pdo->query("SELECT racer.uid,racer.name, racerno,SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS time,SEC_TO_TIME(sum(TIME_TO_SEC(penalty))) AS pen,SEC_TO_TIME(SUM(TIME_TO_SEC(total))) AS tot,MAX(checkpoint) as maxc FROM ranklist INNER JOIN racer ON racer.uid = ranklist.racerno AND racer.class=($n) GROUP BY racerno ORDER BY maxc DESC,tot ASC,pen ASC")?>
                    <table class="table table-bordered table-dark table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Checkpoint Crossed</th>
                                <th scope="col">COMP Number</th>
                                <th scope="col">Name</th>
                                <th scope="col">Travelling Time</th>
                                <th scope="col">Penalty Time</th>
                                <!-- <th scope="col">SS1 Time</th>
                                <th scope="col">SS2 Time</th> -->
                                <th scope="col">Total Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                while($data = $class->fetch(PDO::FETCH_ASSOC))
                                {
                                    // $FETCH_OTHER_QUERY = "SELECT * FROM ranklist WHERE racerno = ". $data['racerno'] ;
                                    // $fetch_other = $pdo->query($FETCH_OTHER_QUERY);
                                    // $transportTime="00:00:00"; 
                                    // $penaltyTime="00:00:00";
                                    // $ss1Time="00:00:00";
                                    // $ss2Time="00:00:00";
                                    // while($fetch_other2 = $fetch_other->fetch(PDO::FETCH_ASSOC))
                                    // {
                                    //     if($fetch_other2['checkpoint']==2)
                                    //     {
                                    //         $transportTime = $fetch_other2['time'];
                                    //         $penaltyTime =   $fetch_other2['penalty'];
                                    //     }
                                    //     if($fetch_other2['checkpoint']==3)
                                    //     {
                                    //         $ss1Time = $fetch_other2['time'];
                                    //     }
                                    //     if($fetch_other2['checkpoint']==4)
                                    //     {
                                    //         $ss2Time = $fetch_other2['time'];
                                    //     }
                                    // }
                                    echo '<tr class="table-light" style="color:black;">';
                                    echo '<th>'.$i.'</th>';
                                    echo '<td>'.$data['maxc'].'</td>';
                                    echo '<td>'.$data['racerno'].'</td>';
                                    echo '<td>'.$data['name'].'</td>';
                                    echo '<td>'.$data['time'].'</td>';
                                    echo '<td>'.$data['pen'].'</td>';
                                    // echo '<td>'.$ss1Time.'</td>';
                                    // echo '<td>'.$ss2Time.'</td>';
                                    echo '<td>'.$data['tot'].'</td>';
                                    echo '</tr>';
                                    $i+=1;
                                }
                              
                                
                                echo '</tbody></table>';

                            }
                            
                            ?>
                            </div>
                            </div>
                            <!--CLASS N ends-->
                            
                                                   
                </div>
            </div>
        </div>
    </div>
    <div id="footer"></div>

   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
<script>
    setTimeout(function() {
        location.reload();
    }, 10000);
</script>
</html>