<?php
require_once("pdo.php");
?>
<html lang="en">

   
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
        document.title = "LAP2 HBT";
    </script> 

        <!--Navbar Starts-->
        <div id="header"></div>
           
       

        <div class="container">
            <h2>SECTION 2 Sheet</h2>
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th rowspan="2">COMP. NO.</th>
                    <th>HOTEL BEE TOWN</th>
                    <th colspan="2">CHINAR HILLS</th>
                    <th >STAGE 2(FF)</th>
                    <th >TRANSPORT AFTER STAGE</th>
                    <th colspan="2">HOTEL BEE TOWN</th>
                    
                
                
                </tr>
                <tr>
                    <th>TRANSPORT 3/6 START</th>
                    <th>TRANSPORT 3/6 STOP</th>
                    <th>STAGE 2/3 START</th>
                    <th>STOP</th>
                    <th>START</th>
                    <th>SERVICE IN 2/2 &<br>TRANSPORT 4/6 END</th>
                    <th>SERVICE OUT 2/2</th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $pdo->query("SELECT uid FROM racer");
                    while($data = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        echo "<tr>";
                        echo "<td>".$data['uid']."</td>";
                        $uid = $data['uid'];
                        //Btown Start
                        $selecthbt = $pdo->query("SELECT departure FROM racerdata WHERE racerno = $uid AND checkpointno = 4+1");
                        $selecthbt = ($selecthbt->fetch(PDO::FETCH_ASSOC));
                        if(isset($selecthbt['departure'])&&!is_null($selecthbt['departure']))
                            echo '<td>'.$selecthbt['departure'].'</td>';
                        else
                            echo '<td><a href="lap2_beetown_depart.php?racerno='.$uid.'"> <button class="btn btn-primary" type="button">'.$uid.': Start</button></a> </td>';
                        //Chinar Stop
                        $selectch = $pdo->query("SELECT arrival FROM racerdata WHERE racerno = $uid AND checkpointno = 4+2");
                        $selectch = ($selectch->fetch(PDO::FETCH_ASSOC));
                        if(isset($selectch['arrival'])&&!is_null($selectch['arrival']))
                            echo '<td>'.$selectch['arrival'].'</td>';
                        else
                            echo '<td><a href="lap1_chinar_depart.php?racerno='.$uid.'"> <button disabled class="btn btn-primary" type="button">'.$uid.': Stop</button></a> </td>';
                        //Chinar Start
                        $selectch = $pdo->query("SELECT departure FROM racerdata WHERE racerno = $uid AND checkpointno = 4+2");
                        $selectch = ($selectch->fetch(PDO::FETCH_ASSOC)); 
                        if(isset($selectch['departure'])&&!is_null($selectch['departure']))
                            echo '<td>'.$selectch['departure'].'</td>';
                        else
                            echo '<td><a href="lap1_chinar_depart.php?racerno='.$uid.'"> <button disabled class="btn btn-primary" type="button">'.$uid.': Start</button></a> </td>';
                        //FF Stop
                        $selectch = $pdo->query("SELECT arrival FROM racerdata WHERE racerno = $uid AND checkpointno = 4+3");
                        $selectch = ($selectch->fetch(PDO::FETCH_ASSOC));
                        if(isset($selectch['arrival'])&&!is_null($selectch['arrival']))
                            echo '<td>'.$selectch['arrival'].'</td>';
                        else
                            echo '<td><a href="lap1_fastflag_arrive.php?racerno='.$uid.'"> <button disabled class="btn btn-primary" type="button">'.$uid.': Stop</button></a> </td>';          
                        //SS Start 
                        $selectch = $pdo->query("SELECT departure FROM racerdata WHERE racerno = $uid AND checkpointno = 4+4");
                        $selectch = ($selectch->fetch(PDO::FETCH_ASSOC)); 
                        if(isset($selectch['departure'])&&!is_null($selecthbt['departure']))
                            echo '<td>'.$selectch['departure'].'</td>';
                        else
                            echo '<td><a href="lap1_sst_depart  .php?racerno='.$uid.'"> <button disabled class="btn btn-primary" type="button">'.$uid.': Start</button></a> </td>';
                        //SC STOP
                        $selectch = $pdo->query("SELECT arrival FROM racerdata WHERE racerno = $uid AND checkpointno = 4+5");
                        $selectch = ($selectch->fetch(PDO::FETCH_ASSOC)); 
                        if(isset($selectch['arrival'])&&!is_null($selectch['arrival']))
                            echo '<td>'.$selectch['arrival'].'</td>';
                        else
                            echo '<td><a href="lap1_sc_arrive.php?racerno='.$uid.'"> <button disabled class="btn btn-primary" type="button">'.$uid.': Stop</button></a> </td>';
                        //SC START
                        $selectch = $pdo->query("SELECT departure FROM racerdata WHERE racerno = $uid AND checkpointno = 4+5");
                        $selectch = ($selectch->fetch(PDO::FETCH_ASSOC)); 
                        if(isset($selectch['departure'])&&!is_null($selectch['departure']))
                            echo '<td>'.$selectch['departure'].'</td>';
                        else
                            echo '<td><a href="lap1_sc_depart.php?racerno='.$uid.'"> <button disabled  class="btn btn-primary" type="button">'.$uid.': Start</button></a> </td>';
                        echo '</tr>';
                        
                        
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="footer"></div>
            

</body>


