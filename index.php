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
    <form action="Flight_details.php" method="GET" class="flight-form">
        <div class="form-group">
            <label for="FromAirport">From:</label>
            <input type="text" name="FromAirport" id="FromAirport" required>
        </div>
        <div class="form-group">
            <label for="ToAirport">To:</label>
            <input type="text" name="ToAirport" id="ToAirport" required>
        </div>
        <div class="form-group">
            <label for="Date">Date:</label>
            <input type="date" name="Date" id="Date" required>
        </div>
        <div class="form-group">
            <label for="Passengers">Passengers:</label>
            <input type="number" name="Passengers" id="Passengers" required>
        </div>
        <div class="form-group">
            <label for="Filter">Filter:</label>
            <input list="Filters" name="Filter" id="Filter">
            <datalist id="Filters">
                <option value="None">
                <option value="Cost">
                <option value="Time">
            </datalist>
        </div>
        <button type="submit" name="Search" id="Search">Search</button>
    </form>
</body>
</html>
