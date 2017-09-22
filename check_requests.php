
<?php

	$conn = mysqli_connect('localhost','root','','hackathon');
	if(!$conn)
	{
		die('connection error'. mysqli_connect_error());
		
	}
	else{
		$sql = "SELECT requests.r_id,requests.u_id,user.name FROM requests INNER JOIN user on requests.u_id = user.id";
		$result = mysqli_query($conn,$sql);
		$data = array();
		$count = 0;
		while ( $row = mysqli_fetch_assoc($result))
		{
			$data[] = $row;
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
footer{
	position:fixed;
	bottom:0px;
	left:0px;
	right:0px;
}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">ADMIN</a>
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
        <div class="w3-container" >
         </div>
      </div>
	</div>
	<div class="w3-col m8">
		<div class="w3-card-2 w3-round w3-white" style="padding-top:5px">
        
		<h2 style="margin-bottom:20px;margin-left:10px;">Requests from users</h2>
		
		<table class="table table-striped">
    <thead>
      <tr>
        <th><center>Request ID</center></th>
        <th><center>User ID</center></th>
		<th><center>User name</center></th>
		<th></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  
			  
		</div>
	</div>
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16" id="first-footer">
  <h5>Copyright content</h5>
</footer>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	
    var data = '<?php echo json_encode($data) ?>';
	
    var parsable_data = JSON.parse(data);
    for(i=(parsable_data.length-1);i>=0;i--)
    {
		var r_id = parsable_data[i]['r_id'];
		var u_id = parsable_data[i]['u_id'];
		var u_name = parsable_data[i]['name'];
		$("tbody").append("<tr></tr>");
		$("tbody tr:last").append("<td><center>"+r_id+"</center></td>");
		$("tbody tr:last").append("<td><center>"+u_id+"</center></td>");
		$("tbody tr:last").append("<td><center>"+u_name+"</center></td>");
		$("tbody tr:last").append("<td><button type='button' class='btn btn-primary check-requests' id="+r_id+">Check Request</button></td>");
	}
	
	
</script>
	<script>
			$('.check-requests').click(function(){
				var r_id = $(this).attr('id');
				window.location.href = "show_a_request.php?id="+r_id;
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
</script>

</body>
</html> 
