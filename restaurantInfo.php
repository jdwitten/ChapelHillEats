<html>
<head>
  <link rel="stylesheet" type="text/css" href="infoStyle.css">
   <script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
  </script>
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
echo "<div id = 'newRatingContainer'>";
echo "<h6>Write a review for ".$row['rname']."</h6>";
echo "<h5>Rating:</h5><input type='range' name='rangeInput' min='0' max='100' onchange='updateTextInput(this.value);'id = 'ratingSlider'><input type='text' id='textInput' value=''>";
echo "<textarea id = 'newComment'></textarea><input type ='submit' value='Submit' id='submit'></form>";
echo "</div>";
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
  echo "<div class = 'comment'>".$comment."</div>";
}
?>

</body>
</html>
