<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Booked Flights</title>
    <link rel="stylesheet" href="styles.css">
</head>
<div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="content"></div>
<body>
    <div class="header">
        <h1> Your Booked Flights</h1>
        <br>
        <br>
    </div>
    <?php
    if($_SERVER['REQUEST_METHOD']=='GET')
        $conn=mysqli_connect('localhost','root','','test')or die("Connection Failed:" .mysqli_connect_error());
    $name=$_GET['name'];
    $age=$_GET['age'];
    $email=$_GET['email'];
    $Phone_no=$_GET['Phone_no'];
    $sql="SELECT `Flight_Route_No`,`FDAirline_No`,`Name`,`FDModel_No`,`From_Terminal`,`To_Terminal`,`Departure_time`,`Arrival_time`,`Cost` FROM `flight_details`,`aeroplane`,`airline` WHERE FDModel_No=Model_No AND FDAirline_No=Airline_No AND Flight_Route_No=(SELECT CFlight_Route_No FROM customers WHERE Name='$name' AND age='$age' AND Phone_No='$Phone_no' AND Email='$email')";
    $query=mysqli_query($conn,$sql);
    if($query)
            {
                while($row=mysqli_fetch_assoc($query))
                {
            ?>
            <div class="flight-card">
                <h3>Flight Details</h3>
                <?php
                if($row['FDAirline_No']=='I5'){?>
                <img src="https://w7.pngwing.com/pngs/976/738/png-transparent-flight-indonesia-airasia-airasia-japan-airline-ticket-others-company-text-logo-thumbnail.png" style="float:right;width:108px;height:72px;"><?php }?>
                <?php
                if($row['FDAirline_No']=='6E'){?>
                <img src="https://travelbizmonitor.com/wp-content/uploads/2021/06/Indigo_logo.png" style="float:right;width:108px;height:72px;"><?php }?>
                <?php
                if($row['FDAirline_No']=='9I'){?>
                <img src="https://static.wikia.nocookie.net/logopedia/images/1/1d/200331001-1-15_-_Copy_-_Copy.png/revision/latest?cb=20220226142918" style="float:right;width:108px;height:72px;"><?php }?>
                <?php
                if($row['FDAirline_No']=='QP'){?>
                <img src="https://a.storyblok.com/f/159922/3840x2160/9ba564123d/akasalogo.png" style="float:right;width:108px;height:72px;"><?php }?>
                <?php
                if($row['FDAirline_No']=='UK'){?>
                <img src="https://vectorseek.com/wp-content/uploads/2022/03/Vistara-Logo-Vector.jpg" style="float:right;width:108px;height:72px;"><?php }?>
                <?php
                if($row['FDAirline_No']=='SG'){?>
                <img src="https://companieslogo.com/img/orig/SPICEJET.NS_BIG-2cabca10.png" style="float:right;width:108px;height:72px;"><?php }?>
                <?php
                if($row['FDAirline_No']=='AI'){?>
                <img src="https://1000logos.net/wp-content/uploads/2020/09/Air-India-logo.png" style="float:right;width:108px;height:72px;"><?php }?>
                <p>Airline :<?php echo $row['FDAirline_No'];?>
                <?php echo $row['Name'];?></p>
                <p>Aeroplane :<?php echo $row['FDModel_No'];?>
                From Terminal :<?php echo $row['From_Terminal'];?>
                To Terminal :<?php echo $row['To_Terminal'];?></p>
                <p>Departure Time: <?php echo $row['Departure_time'];?></p>
                <p>Arrival Time: <?php echo $row['Arrival_time'];?></p>
                <?php
                }
            }
            ?>
            </div>
</body>
</html>