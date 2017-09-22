<?php
$conn = mysqli_connect('localhost','root','','hackathon');
				if(!$conn)
				{
					die('connection error'. mysqli_connect_error());
					
				}
				else
				{
					

if( isset($_POST['points']))
{
    $points = $_POST['points'];
	echo $points;
	$r_id = $_POST['r_id'];
    $qry = mysqli_query($conn,"UPDATE requests
SET granted_pts=$points, r_response=true
WHERE r_id = $r_id");
	 
    if($qry)
        echo $points;
    else
        echo 0;
}
else{
	$r_id = $_POST['r_id'];
    $qry = mysqli_query($conn,"UPDATE requests
SET  r_response=true
WHERE r_id = $r_id");
	 
    if($qry)
        echo 1;
    else
        echo 0;
}
}

?>