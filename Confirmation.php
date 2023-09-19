<?php
$name = array();
$age= array();
$email= array();
$phone_no= array();
$conn=mysqli_connect('localhost','root','','test')or die("Connection Failed:" .mysqli_connect_error());
$Seats = $_GET['Passengers'];
$Flight_Route_No=$_GET['Flight_RNo'];
foreach (explode("&", $_SERVER['QUERY_STRING']) as $tmp_arr_param) {
    $split_param = explode("=", $tmp_arr_param);
    if ($split_param[0] == "name") {
        $name[] = urldecode($split_param[1]);
    }
    if ($split_param[0] == "Age") {
        $age[] = urldecode($split_param[1]);
    }
    if ($split_param[0] == "email") {
        $email[] = urldecode($split_param[1]);
    }
    if ($split_param[0] == "Phone_no") {
        $phone_no[] = urldecode($split_param[1]);
    }
}
for($i=0;$i<$Seats;$i++)
{
    $sql="INSERT INTO `customers`(`CFlight_Route_No`,`Name`,`Age`,`Email`,`Phone_No`) VALUES('$Flight_Route_No','$name[$i]','$age[$i]','$email[$i]','$phone_no[$i]')";
    $query=mysqli_query($conn,$sql);
}
$sql1="UPDATE flight_details SET `Seats_left` =`Seats_left`-$Seats WHERE `Flight_Route_No`=$Flight_Route_No";
$query=mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Booking Confirmation</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 325px;
		margin: 30px auto;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}	
	.modal-confirm .icon-box {
		color: #fff;		
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #82ce34;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-confirm .icon-box i {
		font-size: 58px;
		position: relative;
		top: 3px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #82ce34;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #6fb32b;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body>
<div class="text-center">
	<a href="#myModal" class="trigger-btn" data-toggle="modal">Click to proceed</a>
</div>
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>				
				<h4 class="modal-title">Awesome!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
			</div>
			<div class="modal-footer">
				<a href="http://localhost:3000/index.php" class ="btn" ><button class="btn btn-success btn-block" data-dismiss="modal" >OK</button></a>
			</div>
		</div>
	</div>
</div>     
</body>
</html>