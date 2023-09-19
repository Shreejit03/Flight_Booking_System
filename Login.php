<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <div class="content"></div>
<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form action="Display.php" method="GET" id="login-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone number">Phone number:</label>
                <input type="number" id="Phone_no" name="Phone_no" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
