<html>
<head>
  <link rel="stylesheet" type="text/css" href="infoStyle.css">
</head>
<body>
<div id = "header"></div>  
  
<?php
$rid = $_GET['rname'];
echo $rname;
$host = "us-cdbr-azure-east-a.cloudapp.net";
$user = "b2829da0080961";
$pwd = "926e92e0";
$db = "acsm_2fd6830ca4dfb48";

// Create connection
$conn = new mysqli($host, $user, $pwd, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "select rid,rname,phone,address,rating,photoURL from acsm_2fd6830ca4dfb48.restaraunts where rid = ".$rid;
$result = $conn->query($sql);

$row = $result->fetch_assoc();

echo "<img src =" .$row['photoURL']."></img>";
echo "<h4>".$row['rname']."</h4>";
echo "<h1>Address: ".$row['address']."    Phone Number: ". $row['phone']"</h1>";



?>

</body>
</html>
