<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css?v=<?php echo time();?>">
    <title>Sign Up</title>
</head>
<body>
    <div class="logo"><a href="index.html"><img src="logo.png"></a></div>
    <nav>
        <ul class="nav-items">
            <li><a href="index.html">Home</a></li>
            <li><a href="members.html">Our Members</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signUp.php">Sign Up</a></li>
        </ul>
    </nav>
    <form class="box" action="signUp.php" method="POST">
        <h1>Sign Up</h1>
        <input name="fname" type="text" placeholder="First Name">
        <input name="lname" type="text" placeholder="Last Name">
        <input name="email" type="email" placeholder="Email">
        <input name="phone" type="number" placeholder="Phone Number">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input name="loc" type="text" placeholder="Location">
        <input name="signUp" type="submit" value="Sign Up">
    </form>
</body>
</html>
<?php
    $con = mysqli_connect("localhost","root");
    if(!$con)
        die("Could not connect to the server. " .mysqli_connect_error());
    
    $DBcon = mysqli_select_db($con, "isd");
    if(!$DBcon)
        die("Could not find the database");
    
    extract($_POST);
    //Insert a record
    if(isset($signUp)){
        $dbI = mysqli_query($con,"INSERT INTO user(username, password, role, first_name, 
        last_name, phone, email, address)
        VALUES('$username', '$password', 2, '$fname' , '$lname' , $phone , '$email' , '$loc')")
        or die("Could not insert ".mysqli_error($con));
        //echo"Success";
    }
    mysqli_close($con);

?>