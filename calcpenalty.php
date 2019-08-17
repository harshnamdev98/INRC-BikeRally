<?php
    // calc_penalty("00:90:00.000","00:45:00.000",60,10);
    function calc_penalty($travelingTime,$expectedTime,$earlyPen,$latePen)
    {
        if($travelingTime>$expectedTime)
        {
            $pen = $latePen;
            $td = get_time_difference2(explode(".",$travelingTime)[0],explode(".",$expectedTime)[0]);
            
        }
        else
        {
            $pen = $earlyPen;
            $td = get_time_difference2(explode(".",$expectedTime)[0],explode(".",$travelingTime)[0]);
        }
        $pen= $td*$pen;
        $hour = floor(($pen)/3600);
        $minute = floor(($pen -$hour)/60);
        $second = ($pen)-($hour*3600+$minute*60);;
        $penalty = $hour.":".$minute.":".$second;
        return $penalty;
    }
    function get_time_difference2($t1, $t2)
    {
        $t1 = explode(":", $t1);
        $t2 = explode(":", $t2);
        $first = $t1[0]*3600+$t1[1]*60+t1[2];
        $second = $t2[0]*3600+$t2[1]*60+t2[2];
        $diff = $first-$second;
        $diff = $diff - ($diff%60);
        //$diff = floor(($first - $second)/60);
        return floor($diff/60);    
    }
?>