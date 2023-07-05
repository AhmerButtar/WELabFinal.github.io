<?php
// Assuming you have created a database named 'studentsdb' with a table named 'students'

// Database credentials
$host = 'localhost'; // Replace with your database host
$dbName = 'ahmer_nadeem'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Establish a connection to the database
$conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $address = $_POST['address'];

  // Prepare the SQL statement
  $sql = "INSERT INTO register (name, gender, email, address) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  // Execute the statement with the form data
  $stmt->execute([$name, $gender, $email, $address]);

  // Redirect to a success page or do something else
  header('Location: success.php');
  exit();
}
?>
