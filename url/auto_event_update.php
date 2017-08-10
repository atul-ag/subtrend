<?php
include ("dbConnection.php"); 

function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
    $output=curl_exec($ch);
 	if($output === false)
    {
        echo "Error Number:".curl_errno($ch)."<br>";
        echo "Error String:".curl_error($ch);
    }
    curl_close($ch);
    return $output;
}
$result=httpGet("https://contesttrackerapi.herokuapp.com/");
if($result!=false && $result!="false"){
$result=(json_decode($result,true));

echo "<h1> Ongoing events</h1></br>";
$ongoing_evnt=$result["result"]["ongoing"];
foreach( $ongoing_evnt as $evnt){
	echo $ev_end=strtotime($evnt["EndTime"]);
	echo ' ';   //endtime
	echo $ev_name=$evnt["Name"];
	echo ' ';
	echo $ev_site=$evnt["Platform"];
	echo '</br>';
	$q=mysqli_query($con,"SELECT * FROM present WHERE (event_name = '$ev_name' AND event_site='$ev_site')"); echo (mysqli_error($con));
	$c=mysqli_num_rows($q);
	if($c==0) {
		$ev_id=uniqid();
		$ins=mysqli_query($con,"INSERT INTO present (event_id,event_end,event_name,event_site) VALUES ('$ev_id','$ev_end','$ev_name','$ev_site')");
	}
	else {
		$data=mysqli_fetch_array($q);
		$ev_id=$data['event_id'];
		if($ev_end != $data['event_end'])
			$upd=mysqli_query($con,"UPDATE present SET event_end='$ev_end' WHERE event_id='$ev_id'") or die(mysqli_error($con));
	}
	
}
echo "</br>";

$upcoming_evnt=$result["result"]["upcoming"];
echo "<h1> Upcoming events</h1></br>";
foreach( $upcoming_evnt as $evnt){
	echo $ev_start=strtotime($evnt["EndTime"]); //end time
	echo ' ';
	echo $ev_end=strtotime($evnt["StartTime"]);   //starttime
	echo ' ';
	echo $ev_name=$evnt["Name"] ;	
	$ev_name=mysqli_real_escape_string($con,$ev_name);
	echo ' ';
	echo $ev_site=$evnt["Platform"];
	echo '<br>';
	$q=mysqli_query($con,"SELECT * FROM future WHERE (event_name = '$ev_name' AND event_site='$ev_site')"); echo (mysqli_error($con));
	$c=mysqli_num_rows($q);
	if($c==0) {
		$ev_id=uniqid();
		$ins=mysqli_query($con,"INSERT INTO future (event_id,event_start,event_end,event_name,event_site) VALUES ('$ev_id','$ev_start','$ev_end','$ev_name','$ev_site')");
	}
	else {
		$data=mysqli_fetch_array($q);
		$ev_id=$data['event_id'];
		if($ev_start != $data['event_start'] || $ev_end != $data['event_end'])
			$upd=mysqli_query($con,"UPDATE future SET event_start='$ev_start' , event_end='$ev_end' WHERE event_id='$ev_id'") or die(mysqli_error($con));
	}
}
}
else{
	echo "some problem occured";
}

?>