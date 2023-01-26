<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACE | Add New Member</title>
    <link rel="stylesheet" href="addMember.css?v=<?php echo time();?>">
</head>
<body>
    <div class="logo"><a href="index.html"><img src="logo.png"></a></div>
    <nav>
        <ul class="nav-items">
            <li><a href="admin.html">Back</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </nav>
    
    <h4>Please fill the below form to add a new member (Admin).</h4>
    <h1 class="title">Add New Member</h1>
    <form class="box" action="addMember.php" method="POST">
        <h1>Add</h1>
        <input name="fname" type="text" placeholder="First Name">
        <input name="lname" type="text" placeholder="Last Name">
        <input name="email" type="email" placeholder="Email">
        <input name="phone" type="number" placeholder="Phone Number">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input name="loc" type="text" placeholder="Location">
        <input name="add" type="submit" value="Submit">
    </form>
    <p class="sideParagraph"><em>Once you submit the form, a new member  
        <br>(Admin) will be added to the system database.<br></em>
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
      if(isset($add)){
          $dbI = mysqli_query($con,"INSERT INTO admin(first_name, last_name, phone, email, address)
          VALUES('$fname' , '$lname' , $phone ,'$email' ,'$loc')")
          or die("Could not insert ".mysqli_error($con));

          $dbI2 = mysqli_query($con,"INSERT INTO user(username, password, role, first_name, last_name, 
          phone, email, address)
          VALUES('$username', '$password', 1, '$fname' , '$lname' , $phone ,'$email' ,'$loc')")
          or die("Could not insert ".mysqli_error($con));
      }
      mysqli_close($con);
?>