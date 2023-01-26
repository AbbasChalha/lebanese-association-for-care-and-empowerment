<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css?v=<?php echo time();?>">
    <title>Login</title>
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
    <form class="box" action="login.php" method="POST">
        <h1>Login</h1>
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input name="login" type="submit" value="Login">
    </form>
</body>
</html>
<?php 
    extract($_POST);
    $error = ''; // Variable To Store Error Message
    if (isset($login)) {
        if (empty($username) || empty($password)) {
            $error = "Username or Password is Invalid";
        }else{	
            $con = mysqli_connect("localhost", "root","", "isd");
            $sql = "SELECT * From user WHERE password = '".$password."' and username = '".$username."'";
            $result = mysqli_query($con, $sql);
            $rows = mysqli_num_rows($result);//Count the rows
            if ($rows == 1) { //Username is matching with the password
                $res = mysqli_fetch_array($result);			
                if ($res['role'] == 1){		
                    header("location: admin.html"); // Redirecting To Admin Page
                }else if ($res['role'] == 2){
                    header("location: user.html"); // Redirecting To User Page
                }
            } 
            else {
                $error = "Username or Password is Invalid";
            }
            mysqli_close($con); // Closing Connection
        }
    }
?>