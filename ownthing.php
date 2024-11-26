<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inserting into a database</title>
</head>
<body>
    
<form method="POST">
User ID: <input type="text" name="userID"><br>
Image: <input type="text" name="pic"><br>
<input type="submit" value="Add!">
</form> 

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "starsinfo"; // Database name

// Create connection
$conn = new mysqli("127.0.0.1", "root", "", "stars");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values and sanitize them
    $userid = isset($_POST['userID']) ? trim($_POST['userID']) : '';  // Get userID, sanitize input
    $img = isset($_POST['pic']) ? trim($_POST['pic']) : '';            // Get pic, sanitize input

    // Check if both fields are filled
    if (!empty($userid) && !empty($img)) {
        // Insert data into the table
        $sql = "INSERT INTO starinfo (userID, pic) VALUES ('$userid', '$img')";
        
        if ($conn->query($sql) === TRUE) {
            // Redirect to the same page to prevent re-submission on refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit(); // Ensure no further code is executed after redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Handle case where input fields are empty
        echo "<br>Both User ID and Image fields must be filled.";
    }
}

// Fetch and display records from the database
$sql = "SELECT id, userID, pic FROM starinfo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<br><br>ID: " . $row["id"] . " <br>User ID: " . $row["userID"] . " <br>Image: " . $row["pic"] . " <br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
