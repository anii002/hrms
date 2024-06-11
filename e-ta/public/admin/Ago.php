<?php
date_default_timezone_set("Asia/kolkata");
echo date_default_timezone_get();
class Ago
{


    public function convertToUnixTimestamp1($value1) {
        date_default_timezone_set('Asia/Kolkata');
        list($date, $time) = explode(' ', $value1);
        list($year, $month, $day) = explode('-', $date);
        list($hour, $minutes, $seconds) = explode(':', $time);


        $unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);

        return $unit_timestamp;
    }

    public function convertToUnixTimestamp2($value1) {
        date_default_timezone_set('Asia/Kolkata');
        list($date, $time) = explode(' ', $value1);
        list($year, $month, $day) = explode('-', $date);
        list($hour, $minutes, $seconds) = explode(':', $time);


        $unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);

        return $unit_timestamp;
    }
    
    public function convertToAgoFormat($timestamp1,$timestamp2){
        date_default_timezone_set('Asia/Kolkata');
        $diffBtwCurrentTimeAndTimestamp = $timestamp2 - $timestamp1;
        $periodsString = ["sec", "min", "hr", "day", "week", "month", "year", "decade"];
        $periodsNumber = ["60", "60", "24", "7", "4.35", "12", "10"];
        
        for($iterator = 0; $diffBtwCurrentTimeAndTimestamp >= $periodsNumber[$iterator]; $iterator++)
            $diffBtwCurrentTimeAndTimestamp /= $periodsNumber[$iterator];
            $diffBtwCurrentTimeAndTimestamp = round($diffBtwCurrentTimeAndTimestamp);

            if($diffBtwCurrentTimeAndTimestamp != 1) $periodsString[$iterator].="s";
            $output = "$diffBtwCurrentTimeAndTimestamp $periodsString[$iterator]"; //2 days

            return " ".$output." ";
    }
}
?>
<?php 
/*$forwarded = "2017-09-24 20:17:16"; //now()
$approved = "2017-09-24 20:25:19"; //now()
$ago = new Ago();
$unixTimestamp1 = $ago->convertToUnixTimestamp1($forwarded);
$unixTimestamp2 = $ago->convertToUnixTimestamp2($approved);
*/
?>
<!--div style="width: 350px;">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
    <span style="float: right; font-size: 10px; color: gray;">
        <?php //echo $ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2); ?>
    </span>
</div-->