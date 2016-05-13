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
echo "<h1>".$row['address']."  ". $row['phone']."</h1>";
echo "<h3>Rating: ".$row['rating']."</h3>";
echo "<textarea rows = '5' cols = '50'></textarea>"
$fetchComments = "select date, comment from acsm_2fd6830ca4dfb48.comments where rid = ".$rid;

$comments = $conn->query($fetchComments);

if ($comments->num_rows > 0) {
    
    // output comments of each row
    while($row = $comments->fetch_assoc()){
      buildComment($row['date'],$row['comment']);
    }
} else {
    echo "0 results";
}
$conn->close();
function buildComment($date, $comment){
  echo "<div class = 'comment'>".$comment."</div>"
}
?>

</body>
</html>
