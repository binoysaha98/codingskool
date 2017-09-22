<?php
$bd=mysqli_connect("localhost","root","iamfake");
if(!$bd)
{
    die('oops connection problem ! --> '.mysqli_error());
}
if(!mysqli_select_db($bd,"cool"))
{
    die('oops database selection problem ! --> '.mysqli_error());
}
?>
