<?php session_start();
	$id="";
  $name="";
 if(empty($_SESSION['name']))
 {
   $name="Login/Register";
 }
 else {
   $name=$_SESSION['name'];
  
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
    $qry = mysqli_query($conn,"SELECT r_id,r_points,r_response FROM requests where u_id='".$id."'");
    $data = array();
		$count = 0;
		while ( $row = mysqli_fetch_assoc($qry))
		{
			$data[] = $row;
		}
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
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="profile.php" class="w3-bar-item w3-button w3-padding-large">Profile</a>
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
	<div class="w3-col m2">
		<div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
		</div>
		</div>
	</div>
  

    <div class="w3-col m8 w3-card-2" style="margin-left:20px;overflow:hidden;">
	<h2 style="margin-bottom:20px;margin-left:10px">Your Requests</h2> 
  <table class="table table-striped" >
    <thead>
      <tr>
        <th>Request ID</th>
        <th>
		Requested Points
		</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

    </div>


  <!-- End Grid -->
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
    var data = '<?php echo json_encode($data) ?>';
	
    var parsable_data = JSON.parse(data);

	for(i=0;i<parsable_data.length;i++)
	{
		$("tbody").append('<tr></tr>');
		$("tbody tr:last").append('<td>'+parsable_data[i]["r_id"]+'</td>');
		$("tbody tr:last").append('<td>'+parsable_data[i]["r_points"]+'</td>');
		if(parsable_data[i]['r_response'] == 0)
		{
				$("tbody tr:last").append('<td>Request Rejected</td>');
				
		}
		else if(parsable_data[i]['r_response'] == 1){
		$("tbody tr:last").append('<td>Request Accepted</td>');	
		}
		else{
			$("tbody tr:last").append('<td>Pending Request</td>');	
		}
		
	}

	
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
</script>

</body>
</html>
