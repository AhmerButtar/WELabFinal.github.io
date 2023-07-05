<?php
// Database connection details
$host = 'localhost'; // Replace with your database host
$dbName = 'ahmer_nadeem'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    // Update the record in the database
    $sql = "UPDATE students SET name='$name', gender='$gender', email='$email', address='$address' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!-- HTML code for the edit form -->
<html>
<head>
    <!-- Your CSS and other head elements -->
</head>
<body>
    <!-- Your existing HTML code for the registration form -->

    <div class="w-full flex-1 mt-8">
        <div class="mx-auto max-w-xs">
            <form method="POST" action="edit.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" placeholder="Name" name="name" value="<?php echo $name; ?>" />
                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" type="text" placeholder="Gender" name="gender" value="<?php echo $gender; ?>" />
                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" />
                <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" type="text" placeholder="Address" name="address" value="<?php echo $address; ?>" />
                <button type="submit" class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                    <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="8.5" cy="7" r="4" />
                        <path d="M20 8v6M23 11h-6" />
                    </svg>
                    <span class="ml-3">Update</span>
                </button>
            </form>
        </div>
    </div>

    <!-- The rest of your HTML code -->

</body>
</html>
