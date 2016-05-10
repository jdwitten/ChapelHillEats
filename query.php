<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    <div id = splash>
        <h1>Chapel Hill Eats</h1>
        <h2>Explore the culinary diversity of Franklin Street</h2>
    </div>
    <div id = main>
        <h3>Search Restaurants and Bars in Chapel Hill</h3>
      <div id = "search">
        <h4>Type: </h4>
        <form action="query.php" method="post">
            <select name="Type" class = "dropdown">
              <option value=0>Any Type</option>
                <option value=1>Asian</option>
                <option value=2>Bars</option>
                <option value=3>American</option>
                <option value=4>Southern</option>
            </select>
          <h4>Price:</h4>
            <select name="Price"class = "dropdown">
              <option value=0>Any Price</option>
              <option value=1>$0-$10</option>
              <option value=2>$10-$20</option>
              <option value=3>$20-$35</option>
              <option value=4>>$35</option>
          </select>
          <h4>Rating:</h4>
          <select name="Rating"class = "dropdown">
              <option value=0>Any Rating</option>
              <option value=1>1</option>
              <option value=2>2</option>
              <option value=3>3</option>
              <option value=4>4</option>
              <option value=5>5</option>  
          </select>
          <h4>Location</h4>
          <select name="Location"class = "dropdown">
              <option value=0>Any Location</option>
              <option value=1>East Franklin Street</option>
              <option value=2>West Franklin Street</option>
              <option value=3>Carrboro</option>
          </select>
              
        <input type="submit">
          </div>
    </div>
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
if(strcmp($_POST["Type"],"Any Type")){
    $typeEval = "";
}
else{
    $typeEval = " and rtype =".$_POST["Type"];
}
if(strcmp($_POST["Location"],"Any Location")){
    $locationEval = "";
}
else{
    $locationEval = " and location =".$_POST["Location"];
}
if(strcmp($_POST["Price"],"Any Price")){
    $priceEval = "";
}
else{
    $priceEval = "and price =".$_POST["Price"];
}
if(strcmp($_POST["Rating"],"Any Rating")){
    $ratingEval = "";
}
else{
    $ratingEval = "and rating =".$_POST["Rating"];
}
echo $typeEval . $priceEval . $locationEval . $ratingEval;
$sql = "select rname from acsm_2fd6830ca4dfb48.restaraunts where ".$typeEval . $locationEval . $priceEval . $ratingEval;
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
