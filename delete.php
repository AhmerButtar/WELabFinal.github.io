<!DOCTYPE html>
<html>
<head>
  <title>Delete Data</title>
</head>
<body>
  <h1>Delete Data</h1>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Retrieve the ID to delete
      $id = $_POST["id"];

      // Prepare the delete statement
      $stmt = $conn->prepare("DELETE FROM register WHERE id=?");
      $stmt->bind_param("i", $id);

      // Execute the delete statement
      if ($stmt->execute()) {
        echo "Data deleted successfully.";
      } else {
        echo "Error deleting data: " . $stmt->error;
      }

      // Close the prepared statement
      $stmt->close();
    }
  
    // Close the database connection
    $conn->close();
  ?>

</body>
</html>
