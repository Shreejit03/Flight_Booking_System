<?php
    if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['Search']))
        $conn=mysqli_connect('localhost','root','','test')or die("Connection Failed:" .mysqli_connect_error());
    if(!(isset($_GET['FromAirport'])&&isset($_GET['ToAirport'])&&isset($_GET['Date'])))
        die ("Error Occured");
    $From=$_GET['FromAirport'];
    $To=$_GET['ToAirport'];
    $FDate=$_GET['Date'];
    $Seats=$_GET['Passengers']; 
    $Opt=$_GET['Filter'];
    if($Opt=='None')
    $sql="SELECT `Flight_Route_No`,`FDAirline_No`,`Name`,`FDModel_No`,`From_Terminal`,`To_Terminal`,`Departure_time`,`Arrival_time`,`Cost` FROM `flight_details`,`aeroplane`,`airline` WHERE FDModel_No=Model_No AND FDAirline_No=Airline_No AND CAST(Departure_time AS DATE)='$FDate'  AND From_Airport_ID=(SELECT Airport_ID FROM `airport` WHERE City='$From') AND To_Airport_ID=(SELECT Airport_ID FROM `airport` WHERE City='$To') AND Seats_left>$Seats ;";
    elseif($Opt=='Cost')
    $sql="SELECT `Flight_Route_No`,`FDAirline_No`,`Name`,`FDModel_No`,`From_Terminal`,`To_Terminal`,`Departure_time`,`Arrival_time`,`Cost` FROM `flight_details`,`aeroplane`,`airline` WHERE FDModel_No=Model_No AND FDAirline_No=Airline_No AND CAST(Departure_time AS DATE)='$FDate'  AND From_Airport_ID=(SELECT Airport_ID FROM `airport` WHERE City='$From') AND To_Airport_ID=(SELECT Airport_ID FROM `airport` WHERE City='$To') AND Seats_left>$Seats ORDER BY `Cost`";
    elseif($Opt=='Time')
    $sql="SELECT `Flight_Route_No`,`FDAirline_No`,`Name`,`FDModel_No`,`From_Terminal`,`To_Terminal`,`Departure_time`,`Arrival_time`,`Cost` FROM `flight_details`,`aeroplane`,`airline` WHERE FDModel_No=Model_No AND FDAirline_No=Airline_No AND CAST(Departure_time AS DATE)='$FDate'  AND From_Airport_ID=(SELECT Airport_ID FROM `airport` WHERE City='$From') AND To_Airport_ID=(SELECT Airport_ID FROM `airport` WHERE City='$To') AND Seats_left>$Seats ORDER BY Arrival_time-Departure_time";
    $query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking </title>
    <link rel="stylesheet" href="styles.css">
    <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="content"></div>
</head>

<body>
    <header>
        <h1>Flight Booking</h1>
    </header>

    <nav>
        <ul>
            <li><a href="http://localhost:3000/index.php">Home</a></li>
            <li><a href="http://localhost:3000/Login.php">Login</a></li>
        </ul>
    </nav>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h2>Find Your Perfect Flight</h2>
            </div>
        </section>

    <main>
        <section class="search-section">
        <h1 class="display-6 text-align:center"><?php echo "Flights from $From to $To";?></h1>
        </section>
        
        <section class="results-section">
            <h2>Search Results</h2>
            <?php
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
                <p>Price: <?php echo $row['Cost'];?></p>
                <form action="Booking.php" method="GET">
                <input type="hidden" name ="Passengers" value=<?php echo $Seats;?> />
                <input type="hidden" name ="Flight_RNo" value=<?php echo $row['Flight_Route_No'];?> />
                <a href="http://localhost:3000/Booking.php?Passengers=<?php echo $Seats;?>&&Flight_RNo=<?php echo $row['Flight_Route_No'];?>">Book Now</a>
                </form>
            </div>
            <?php
                }
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Flight Booking Website. All rights reserved.</p>
    </footer>
</body>

</html>
