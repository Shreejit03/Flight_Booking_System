<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flights</title>
    <link rel="stylesheet" href="index.css">
</head>
<div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="content"></div>
<body>
    <div class="header">
        <h1>Flights</h1>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=='GET')
        $conn=mysqli_connect('localhost','root','','test')or die("Connection Failed:" .mysqli_connect_error());
        $Seats = $_GET['Passengers'];
        $Flight_Route_No=$_GET['Flight_RNo'];
    ?>
    <form action="Confirmation.php" method="GET" class="flight-form">
    <input type="hidden" name ="Passengers" value=<?php echo $Seats;?> />
    <input type="hidden" name ="Flight_RNo" value=<?php echo $Flight_Route_No;?> />
        <?php
        for($i=0;$i<$Seats;$i++)
        {
        ?>
        <h3>Passenger <?php echo $i+1;?>
        <br>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="Age" name="Age" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone number">Phone number:</label>
                <input type="number" id="Phone_no" name="Phone_no">
            </div>
            <?php
            }
        ?>
        <button type="submit" name="Book" id="Book Seats" >Book</button>
    </form>
</body>
</html>