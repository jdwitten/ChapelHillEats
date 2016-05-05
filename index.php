<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>    
<div id = "Topper"><p>Chapel Hill Eats</p></div>
<?php

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

$sql = "select * from acsm_2fd6830ca4dfb48.restaraunts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Phone Number</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["rname"]."</td><td>".$row["phone"]."</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
