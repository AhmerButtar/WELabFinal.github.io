<!DOCTYPE html>
<html>
<head>
  <title>Read Data</title>
</head>
<body>
  <h1>Read Data from Database</h1>

  <?php
    // Assuming you have a database connection, replace the placeholders with your actual database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ahmer_nadeem";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from a table, replace "your_table" with your actual table name
    $sql = "SELECT * FROM register";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
      // Loop through the rows and display the data
      while ($row = $result->fetch_assoc()) {
        echo "<p>ID: " . $row["id"] . "</p>";
        echo "<p>Name: " . $row["name"] . "</p>";
        echo "<p>Email: " . $row["email"] . "</p>";
        echo "<hr>";
      }
    } else {
      echo "No data found.";
    }

    // Close the database connection
    $conn->close();
  ?>

</body>
</html>
