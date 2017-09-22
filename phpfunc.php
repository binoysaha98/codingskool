<?php
$conn = mysqli_connect('localhost','root','','hackathon');
if(!$conn)
{
    die('connection error'. mysqli_connect_error());

}

if(isset($_POST['user_email']))
{
    $emailId=$_POST['user_email'];
    $query=mysqli_query($conn,"SELECT * FROM user WHERE email='$emailId'");
    $resp='';
    if(mysqli_num_rows($query)>0)
    {
        $resp = "Email already exists!";
        print_r($resp) ;
    }
    else
    {
        $resp = "OK" ;
        print_r($resp);
    }
}

if( isset($_POST['skills']) && isset($_POST['points']) && isset($_POST['desc']) )
{
    $skills = $_POST['skills'];
    $points = $_POST['points'];
    $desc = $_POST['desc'];
    $qry = mysqli_query($conn,"INSERT INTO requests VALUES ('','1', '$skills', '$points', '$desc','','')");
    if($qry)
        echo 1;
    else
        echo 0;
}


?>