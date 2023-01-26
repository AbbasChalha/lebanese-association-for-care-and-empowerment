<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css?v=<?php echo time();?>">
    <title>Assistance Requesters</title>
</head>
<body>
    <?php
     $con = mysqli_connect("localhost","root");
     if(!$con)
        die("Could not connect to the server. " .mysqli_connect_error());
     
     $DBcon = mysqli_select_db($con, "isd");
     if(!$DBcon)
        die("Could not find the database");

     $dbR = mysqli_query($con, "SELECT * FROM requester")
    or die ("Could not find the table");
    echo "<br>";
    echo"<table class='styled-table'>";
    echo"<thead>
            <tr>
                <th>Requester ID</th>
                <th>Fisrt Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Nb Of Family Member</th>
                <th>Occupation</th>
                <th>Income</th>
                <th>Address</th>
            </tr>
        </thead>";
        while($Row = mysqli_fetch_array($dbR)){
        echo"  <tbody>";
           echo"<tr class='active-row'>
                <td>{$Row["requesterID"]}</td>
                <td>{$Row["first_name"]}</td>
                <td>{$Row["last_name"]}</td>
                <td>{$Row["phone"]}</td>
                <td>{$Row["email"]}</td>
                <td>{$Row["nbFamily"]}</td>
                <td>{$Row["workType"]}</td>
                <td>{$Row["income"]}</td>
                <td>{$Row["address"]}</td>            
            </tr> 
        </tbody>";
        }
    echo"</table>";
    ?>
</body>
</html>