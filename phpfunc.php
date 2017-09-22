<?php
$conn = mysqli_connect('localhost','root','','hackathon');
				if(!$conn)
				{
					die('connection error'. mysqli_connect_error());
					
				}
				else
				{
					

if( isset($_POST['skills']) && isset($_POST['points']) && isset($_POST['desc']) )
{
    $skills = $_POST['skills'];
    $points = $_POST['points'];
    $desc = $_POST['desc'];
    $qry = mysqli_query($conn,"INSERT INTO request VALUES ('', '1', '$skills', '$points', '$desc')");
    if($qry)
        echo 1;
    else
        echo 0;
}
				}

?>