<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
    <div id = splash>
        <h1>Franklin Str<h6>eat</h6></h1>
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
          <select name="Rating"class = "dropdown">
              <option value=0>Any Location</option>
              <option value=1>East Franklin Street</option>
              <option value=2>West Franklin Street</option>
              <option value=3>Carrboro</option>
          </select>
              
        <input type="submit">
          </div>
    </div>
    </form>
</body>
</html>
