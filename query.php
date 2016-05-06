<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    
<div id = "Topper"><p>Chapel Hill Eats</p></div>

<form action="query.php" method="post">
    <select name="Type" class = "dropdown">
        <option value="1">Asian</option>
        <option value="2">Bars</option>
        <option value="3">American</option>
        <option value="4">Southern</option>
    </select>
<input type="submit">
</form>
 
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

$sql = "select rname from acsm_2fd6830ca4dfb48.restaraunts where rtype =".$_POST["Type"];
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
