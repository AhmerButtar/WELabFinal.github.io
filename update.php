<!DOCTYPE html>
<html>
<head>
  <title>Update Data</title>
</head>
<body>
  <h1>Update Data</h1>

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
      // Retrieve the form data
      $id = $_POST["id"];
      $name = $_POST["name"];
      $email = $_POST["email"];

      // Prepare the update statement
      $stmt = $conn->prepare("UPDATE register SET name=?, email=? WHERE id=?");
      $stmt->bind_param("ssi", $name, $email, $id);

      // Execute the update statement
      if ($stmt->execute()) {
        echo "Data updated successfully.";
      } else {
        echo "Error updating data: " . $stmt->error;
      }

      // Close the prepared statement
      $stmt->close();
    }
  
    // Close the database connection
    $conn->close();
  ?>

</body>
</html>
