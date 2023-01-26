<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LACE | Apply</title>
    <link rel="stylesheet" href="apply.css?v=<?php echo time();?>">
</head>
<body>
    <div class="logo"><a href="index.html"><img src="logo.png"></a></div>
    <nav>
        <ul class="nav-items">
            <li><a href="user.html">Back</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </nav>
    
    <h4>Please fill the below form to apply to our organization.</h4>
    <h1 class="title">Apply to LACE</h1>
    <form class="box" action="apply.php" method="POST" enctype="multipart/form-data">
        <h1>Apply</h1>
        <input name="fname" type="text" placeholder="First Name">
        <input name="lname" type="text" placeholder="Last Name">
        <input name="email" type="email" placeholder="Email">
        <input name="phone" type="number" placeholder="Phone Number">
        <input name="major" type="text" placeholder="Major" id="major">
        <p class="formParagraph">Upload Your CV:</p>
        <input name="file" type="file" id="userFile">
        <input name="apply" type="submit" value="Submit">
    </form>
    <p class="sideParagraph"><em>We may contact you to an interview if your request was approved. 
        Don’t worry, even if it was not approved, we will help you to find <br> a job in your major field.
    </em>
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
      if(isset($apply)){
          $file_name = $_FILES['file']['name'];
          $file_loc = $_FILES['file']['tmp_name'];
          $folder="Uploads/";
          // make file name in lower case
          $new_file_name = strtolower($file_name);
          $final_file = str_replace(' ','-',$new_file_name);
          if(move_uploaded_file($file_loc, $folder.$final_file)){
            $dbI = mysqli_query($con,"INSERT INTO jobapplicant(first_name, last_name, phone, email, major, cv)
            VALUES('$fname' , '$lname' , $phone ,'$email' ,'$major', '$final_file')")
            or die("Could not insert ".mysqli_error($con));
          }
      }
      mysqli_close($con);
?>