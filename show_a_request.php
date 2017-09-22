
<?php

	$conn = mysqli_connect('localhost','root','','hackathon');
	if(!$conn)
	{
		die('connection error'. mysqli_connect_error());
		
	}
	else{
		$data_i = $_GET['id'];
		$sql = "SELECT requests.r_skills,requests.r_points,requests.r_desc,requests.u_id,user.name FROM requests INNER JOIN user on requests.u_id = user.id where requests.r_id=".$data_i;
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
        
		<h2 class="request-header" style="margin-bottom:20px;margin-left:10px;">Request from </h2>
		<h3 class="request-description" style="margin-bottom:20px;margin-left:10px;">Description<br></h3>
			  
		<table class="table table-striped">
    <thead>
      <tr>
        <th><center>Skill</center></th>
        <th><center>Requested Points</center></th>
		<th>Grant Points</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
	<button type='button' class='btn btn-primary' id="accept" style="margin:10px;margin-left:35px;">Accept</button>
	<button type='button' class='btn btn-primary' id="reject" style="margin:10px;margin-left:0px;">Reject</button>
	
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
	
	$("#accept").click(function(){
		var points_a = [];
		var str_points = "";
		$("input[type='text']").each(function (index, value) { 
			points_a.push($(this).val());
		});
		var r_id = '<?php echo json_encode($data_i) ?>';
	var str_points = points_a.join("|");	
	
        $.ajax({
            type: 'POST',
            url: 'addresponse.php',
            data: {
                'points': str_points,
				'r_id':r_id
                
            },
            success: function(resp) {
				
            }
        });
		window.location.href = "check_requests.php";
	});
	$("#reject").click(function(){
		$.ajax({
            type: 'POST',
            url: 'addresponse.php',
            data: {
                'r_id':r_id
            },
            success: function(resp) {
                
            }
        });
		window.location.href = "check_requests.php";
	});
	
	 var data = '<?php echo json_encode($data) ?>';
    var parsable_data = JSON.parse(data);
	
	var skills = parsable_data[0]['r_skills'];
	var points = parsable_data[0]['r_points'];
	var skills_arr = [];
	var points_arr = [];
	var skills_arr = skills.split("|");
    var points_arr = points.split("|");
        // Display array values on page
        for(var i = 0; i < skills_arr.length; i++){
            $("tbody").append("<tr></tr>");
			$("tbody tr:last").append("<td><center>"+skills_arr[i]+"</center></td>");
			$("tbody tr:last").append("<td><center>"+points_arr[i]+"</center></td>");
			$("tbody tr:last").append("<td><input type='text' class='form-control' style='max-width:200px' id="+(i+1)+"></td>");
			
        }
		
	$(".request-header").append(parsable_data[0]['name']);
	if(parsable_data[0]['r_desc'] == '')
	{
		$(".request-description").append("<h5>No Description</h5>");
	}
	else{
		
	$(".request-description").append("<h5>"+parsable_data[0]['r_desc']+"</h5>");
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
