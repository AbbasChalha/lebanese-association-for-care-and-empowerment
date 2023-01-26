<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACE | Donate</title>
    <link rel="stylesheet" href="donate.css?v=<?php echo time();?>">
</head>
<body>
    <div class="logo"><a href="index.html"><img src="logo.png"></a></div>
    <nav>
        <ul class="nav-items">
            <li><a href="user.html">Back</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </nav>
    
    <h4>Please fill the below form to provide a donation.</h4>
    <h1 class="title">Donation</h1>
    <form class="box" action="donate.php" method="POST">
        <h1>Donate</h1>
        <input name="fname" type="text" placeholder="First Name">
        <input name="lname" type="text" placeholder="Last Name">
        <input name="phone" type="number" placeholder="Phone Number">
        <input name="email" type="email" placeholder="Email">
        <p class="formParagraph">Type of Donation:</p>
        <select name="donationType" id="select">
            <option value="Money">Money</option>
            <option value="Clothes">Clothes</option>
            <option value="Food">Food</option>
        </select>
        <input name="amount" type="text" placeholder="The Amount of Selected Type">
        <input name="loc" type="text" placeholder="Location">
        <input name="donate" type="submit" value="Submit">
    </form>
    <p class="sideParagraph"><em>Once you submit the form, we will contact you 
        <br> as soon as possible to receive your donation. <br>
        Thank you for your support.</em>
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
    if(isset($donate)){
        $dbI = mysqli_query($con,"INSERT INTO donor(first_name, 
        last_name, phone, email, address)
        VALUES('$fname' , '$lname' , $phone , '$email' , '$loc')")
        or die("Could not insert ".mysqli_error($con));
        //echo"Success";

        $dbS = mysqli_query($con, "SELECT donorID FROM donor WHERE phone = $phone")
        or die("Could not find donor".mysqli_error($con));
        $row = mysqli_fetch_array($dbS);
        $id = $row["donorID"];

        $dbI2 = mysqli_query($con,"INSERT INTO donation(donorID, 
        typeDonation, amount)
        VALUES($id , '$donationType', '$amount')")
        or die("Could not insert ".mysqli_error($con));
    }
    mysqli_close($con);
?>