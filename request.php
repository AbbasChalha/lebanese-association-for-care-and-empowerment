<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACE | Request Assistance</title>
    <link rel="stylesheet" href="request.css?v=<?php echo time();?>">
</head>
<body>
    <div class="logo"><a href="index.html"><img src="logo.png"></a></div>
    <nav>
        <ul class="nav-items">
            <li><a href="user.html">Back</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </nav>
    <h4>Please fill the below form to request an assistance.</h4>
    <h1 class="title">Request Assistance</h1>
    <form class="box" action="request.php" method="POST">
        <h1>Request Assistance</h1>
        <input name="fname" type="text" placeholder="First Name">
        <input name="lname" type="text" placeholder="Last Name">
        <input name="phone" type="number" placeholder="Phone Number">
        <input name="email" type="email" placeholder="Email">
        <input name="family" type="text" placeholder="Number of Family Members">
        <input name="occupation" type="text" placeholder="What do you work?">
        <input name="income" type="text" placeholder="The Monthly Income">
        <input name="loc" type="text" placeholder="Location">
        <input name="requestAssis" type="submit" value="Submit">
    </form>
    <p class="sideParagraph"><em>Once you submit the form, we will contact you 
        <br> as soon as possible, also we will visit you, and <br> you may get the donation/support after <br>
        checking up your request and your need.<br>
        Thank you for your request.</em>
    </p>
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
    if(isset($requestAssis)){
        $dbI = mysqli_query($con,"INSERT INTO requester(first_name, 
        last_name, phone, email, nbFamily, workType, income, address)
        VALUES('$fname' , '$lname' , $phone , '$email' , $family, '$occupation', $income, '$loc')")
        or die("Could not insert ".mysqli_error($con));
        //echo"Success";
    }
    mysqli_close($con);
?>