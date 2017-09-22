<?php session_start();
include "dbconnect.php";
	$id="";
  $name="";
 if(empty($_SESSION['name']))
 {
   $name="Login/Register";
 }
 else {
   $name=$_SESSION['name'];
     header("Location: logsignup.php");
 }

 if(!empty($_SESSION['id']))
{
   $id=$_SESSION['id'];
 }
$conn = mysqli_connect('localhost','root','','hackathon');
				if(!$conn)
				{
					die('connection error'. mysqli_connect_error());
					
				}
				else
				{
					

if( isset($_SESSION['id']))
{
	$id=$_SESSION['id'];
    $qry = mysqli_query($conn,"SELECT * FROM profile where userid='".$id."'");
    $data = array();
		$count = 0;
		while ( $row = mysqli_fetch_assoc($qry))
		{
			$data[] = $row;
		}
}
	}
 if(isset($_POST['linksub']))
 {
     $git = $_POST['gitlog'];
     $stack = $_POST['stacklog'];
     $hack = $_POST['hacklog'];
     $query = mysqli_query($bd,"UPDATE user SET github='$git', stackoverflow='$stack', hackerrank='$hack' WHERE id='$id'");
     if($query)
     {?>
         <script>
             alert("Successful");
             window.location.href='profile.php';
         </script>
         <?php
     }
     else
     {?>
         <script>alert("Unsuccessful")</script>
         <?php
     }
 }
 ?>
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
  <a href="pending_requests.php" class="w3-bar-item w3-button w3-padding-large">Requests</a>
  <a href="#" id="my-account" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><?php echo $name;?></a>
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
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px;min-height:450px;">
  <!-- The Grid -->
  <div class="w3-row">
	<div class="w3-col m1">
		<div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
		</div>
		</div>
	</div>
  
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><?php echo $name;?></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
      </div>
      <br>

    <!-- End Left Column -->
    </div>
    <div class="w3-col m7">
        <div class="w3-card-2" style="margin-left:20px;overflow:hidden;">
  <table class="table table-striped" style="position: relative; margin: auto" >
    <thead>
      <tr>
        <th>Skills</th>
        <th>
		Levels<br>
		0 &nbsp;&nbsp;|&nbsp;&nbsp;  1&nbsp;&nbsp;  |&nbsp;&nbsp;  2&nbsp;&nbsp;  |&nbsp;&nbsp;  3
		</th>
        <th>Points</th>
		<th>Update</th>
      </tr>
    </thead>
    <tbody>
      <!-- <tr>
        <td>Logical Thinking</td>
        <td><i class="fa fa-times" aria-hidden="true" ></i> &nbsp;&nbsp; |&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" ></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></td>
        <td>Logical</td>
		<td><button type="button" class="btn btn-primary">Update</button></td>
      </tr>
	  <tr>
        <td>Logical Thinking</td>
        <td><i class="fa fa-times" aria-hidden="true" ></i> &nbsp;&nbsp; |&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" ></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></td>
        <td>Logical</td>
		<td><button type="button" class="btn btn-primary">Update</button></td>
      </tr>-->
    </tbody>
  </table>
        </div>
    </div>
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <div class="w3-container">
                    <h2>Link To</h2>
                    <form method="post">
                        <label>GitHub</label><br>
                        <input type="text" name="gitlog"><br><br>
                        <label>StackOverflow</label><br>
                        <input type="text" name="stacklog"><br><br>
                        <label>HackerRank</label><br>
                        <input type="text" name="hacklog"><br><br>
                        <button type="submit" name="linksub">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


  <!-- End Grid -->

<!-- End Page Container -->
</div>
<br>
<?php //include 'githubconf.php' ?>
<?php include 'footer.php' ?>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='https://api.stackexchange.com/js/2.0/all.js'></script>
<script>
	$("table").on('click','.make-request',function(){
		
		window.location.href = "make_request.php";
	});
    var data = '<?php echo json_encode($data) ?>';
	
    var parsable_data = JSON.parse(data);
	Object.keys(parsable_data[0]).forEach(function(key,index) {
		
		if(parsable_data[0][key] !== null && key != 'userid') {
			$("tbody").append('<tr></tr>');
			$("tbody tr:last").append('<td>'+key+'</td>');
			$("tbody tr:last").append('<td><i class="fa fa-check" aria-hidden="true" ></i> &nbsp;&nbsp; |&nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true" ></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i></td>');
			$("tbody tr:last").append('<td>'+parsable_data[0][key]+'</td>');
			$("tbody tr:last").append('<td><button type="button" class="make-request btn btn-primary" >Make Request</button></td>');
		}
});
	
</script>
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


    SE.init({
        clientId: 10894,
        key: 'uDyzTmSttYL8P4beLwvYQA((',
        channelUrl: 'https://api.stackexchange.com/docs/proxy',
        complete: function (data) {
        }
    });


function stackauth()
{
    SE.authenticate({
        success: function(data) {
            alert(
                'User Authorized with account id = ' +
                data.networkUsers[0].account_id + ', got access token = ' +
                data.accessToken
            );
        },
        error: function(data) {
            alert('An error occurred:\n' + data.errorName + '\n' + data.errorMessage);
        },

        networkUsers: true
    });
}
</script>

<script src="https://www.gstatic.com/firebasejs/4.4.0/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDLZqJxZ3enEbDMkNvgwqLSio_5EFJPgKI",
        authDomain: "codeskool-edd7f.firebaseapp.com",
        databaseURL: "https://codeskool-edd7f.firebaseio.com",
        projectId: "codeskool-edd7f",
        storageBucket: "",
        messagingSenderId: "945810653935"
    };
    firebase.initializeApp(config);
</script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase-messaging.js"></script>
<script>
    function git() {
        provider.addScope('repo');
        provider.setCustomParameters({
            'allow_signup': 'false'
        });
        firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a GitHub Access Token. You can use it to access the GitHub API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            // ...
        }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
        });
    }
</script>


</body>
</html>
