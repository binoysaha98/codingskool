<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
body{
	min-height:700px;
	margin-bottom:120px;
}
#first-footer{
	position:fixed;
	bottom:0px;
	left:0px;
	right:0px;
}
#second-footer{
	height:30px;
	line-height:30px;
	position:fixed;
	bottom:60px;
	left:0px;
	right:0px;
}
.fa-times{
		color:red;
}
.fa-check{
		color:green;
}
</style>
<body class="w3-theme-l5">

  <!-- Navbar -->
  <div class="w3-top">
   <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
    
   </div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
  </div>

  <!-- Page Container -->
  <div class="w3-container w3-content w3-white" style="max-width:1400px;margin-top:80px;min-height:450px; padding:20px;">


<?php

$bd=mysqli_connect("localhost","root","");
if(!$bd)
{
    die('oops connection problem ! --> '.mysqli_error());
}
if(!mysqli_select_db($bd,"hackathon"))
{
    die('oops database selection problem ! --> '.mysqli_error());
}

if((isset($_POST['btn_login'])))
{
   $login_id = $_POST['l-email'];
   $password = $_POST['l-pswd'];
   $epsw = md5($password);
   $res=mysqli_query($bd,"SELECT * FROM user WHERE email='$login_id' and password='$epsw'");
   $row=mysqli_fetch_array($res);
   $p = $row['password'];
   if($row['password'] == $epsw )
   {
       $_SESSION['id'] = $row['id'];
       $_SESSION['name'] = $row['name'];
       $_SESSION['contact'] = $row['contact'];
       $_SESSION['email'] = $row['email'];
       ?>
       <script>
           window.alert("Successful");
           window.location.href="index.php";
       </script>
       <?php
   }
   else
   {?>
       <script>
           window.alert("Unsuccessful");
           window.location.href="index.php";
       </script>
       <?php
   }
}
if((isset($_POST['btn_signup'])))
{
   $name = trim(strip_tags($_POST['s-fname']));
   $email = trim(strip_tags($_POST['s-email']));
   $phno = $_POST['s-phno'];
   $psw1 = $_POST['s-pswd'];
   $psw2 = $_POST['sr-pswd'];
   if($psw1 == $psw2)
   {
       $epswd = md5($psw1);
       $insu = mysqli_query($bd,"INSERT INTO user
 VALUES ('', '$name', '$email', '$phno', '$epswd')");
       if($insu)
       {?>
           <script>
               alert("Successfully Signed In");
               window.location.href='index.php';
           </script>
           <?php
       }
       else
       {?>
           <script>alert("Unsuccessful")</script>
           <?php
       }
   }
}
?>

<ul class="nav nav-tabs">
           <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
           <li><a data-toggle="tab" href="#sign-up">Sign Up</a></li>
       </ul>
			 <div class="w3-white">
       <div class="tab-content">
           <div id="login" class="tab-pane fade in active">
               <h3>Login</h3><br>
               <form class="user-form" id="login-form" method="post">
                   <label>Email ID</label><br>
                   <input name="l-email" class="form-control" placeholder="Email ID" type="email"><br><br>
                   <label>Password</label>
                   <img src="images/icons/phide.png" class="pswshow" onclick="pswdshow(this,'#logpw')"><br>
                   <input id="logpw" name="l-pswd" class="form-control pswd" placeholder="Password" type="password"><br><br>
                   <center>
                       <button type="submit" class="submit-btn" name="btn_login">Login</button>
                   </center>
               </form>
           </div>
           <div id="sign-up" class="tab-pane fade">
               <h3>Sign Up</h3><br>
               <form class="user-form" id="sign-up-form" method="post" name="regform">
                   <label>Name</label><br>
                   <input id="si-fn" name="s-fname" class="form-control" placeholder="Name" type="text" required onkeyup="unValidate(this)" maxlength="15"><br><br>
                   <label>Email</label><br>
                   <input id="si-em" name="s-email" class="form-control" placeholder="Email" type="email" required maxlength="50">
                   <span id="ems"></span><br><br>
                   <label>Phone No</label><br>
                   <input id="si-ph" name="s-phno" class="form-control" placeholder="Phone No" type="text" onkeyup="phoneValidate()" required maxlength="10"><br><br>

                   <label>Password</label>
                   <img src="images/icons/phide.png" class="pswshow" onclick="pswdshow(this,'#si-pw1')"><br>
                   <input id="si-pw1" name="s-pswd" class="form-control pswd" placeholder="Password" type="password" onkeyup="passValidate()" required maxlength="15"><br><br>
                   <label>Re-enter Password</label>
                   <img src="images/icons/phide.png" class="pswshow" onclick="pswdshow(this,'#si-pw2')"><br>
                   <input id="si-pw2" name="sr-pswd" class="form-control pswd" placeholder="Re-enter Password" type="password" onkeyup="passMatch()" required maxlength="15"><br><br>
                   <center>
                       <button id="si-btn" class="submit-btn" type="submit" name="btn_signup" onClick="return checkAll()">Sign Up</button>
                   </center>
               </form>
           </div>
       </div>
		 </div>


       <!-- End Page Container -->
       </div>
       <br>

       <?php include 'footer.php' ?>


       <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

       <!-- Latest compiled JavaScript -->
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script>
       // Accordion
       function myFunction(id) {
           var x = document.getElementById(id);
           if (x.className.indexOf("w3-show") == -1) {
               x.className += " w3-show";
               x.previousElementSibling.className += " w3-theme-d1";
           } else {
               x.className = x.className.replace("w3-show", "");
               x.previousElementSibling.className =
               x.previousElementSibling.className.replace(" w3-theme-d1", "");
           }
       }

       // Used to toggle the menu on smaller screens when clicking on the menu button
       function openNav() {
           var x = document.getElementById("navDemo");
           if (x.className.indexOf("w3-show") == -1) {
               x.className += " w3-show";
           } else {
               x.className = x.className.replace(" w3-show", "");
           }
       }
       </script>

       </body>
       </html>

<script>
   function unValidate(un)
   {
       var unval = un.value;
       if(/^[a-z''A-Z]+$/.test(unval) && unval.indexOf(" ")!=unval.length-1 && unval.indexOf(" ")!=0 && unval.length>1)
       {
           un.className="form-control";
           return true;
       }
       else
       {
           un.className="form-control invalid";
           return false;
       }
   }


   function passValidate()
   {
       var fpsw = document.getElementById("si-pw1");
       var fpswval = fpsw.value;
       if(fpswval.length<8)
       {
           fpsw.className="form-control invalid";
           //document.getElementById("demo").innerHTML = "Hello JavaScript";
           return false;
       }
       else
       {
           fpsw.className="form-control";
           //document.getElementById("demo").innerHTML = "";
           return true;
       }
   }

   function passMatch()
   {
       var ps1 = document.getElementById("si-pw1");
       var ps2 = document.getElementById("si-pw2");
       var ps2val = ps2.value;
       if(ps1.value!=ps2val || ps2val.length<8)
       {
           ps2.className="form-control invalid";
           return false;
       }
       else
       {
           ps2.className="form-control";
           return true;
       }
   }

   function phoneValidate()
   {
       var ph = document.getElementById("si-ph");
       var phval = ph.value;
       if(phval.length==10 && (/^\d{10}$/.test(phval)))
       {
           ph.className="form-control";
           return true;
       }
       else
       {
           ph.className="form-control invalid";
           return false;
       }
   }

   function checkAll()
   {
       if(passValidate() && passMatch() && phoneValidate())
       {
           document.regform.submit();
           return true;
       }
       else
       {
           alert("Details not valid!");
           return false;
       }

   }
</script>
