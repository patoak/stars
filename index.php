<?php 

$x = 4;
echo "<p>$x</p>";


$conn = new mysqli ("127.0.0.1", "root", "", "stars");

$sql = "SELECT * FROM users";
$result = $conn->query("SELECT * FROM users");

//$row = $result->fetch_assoc();
//var_dump($row);



if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID:" . $row["id"]. " <br>Username: " . $row["username"]. " <br>Password:" . $row["pass"]. " <br>";
  }
} else {
  echo "0 results";
}
$conn->close();

echo "<br><br>";

echo "<form method='POST'>";
echo "Username: <input type='text' name='username'><br>";
echo "Password: <input type='password' name='password'><br>";
echo "</form>";
echo "<input type='submit' value='Add';!">

$conn = new mysqli ("127.0.0.1", "root", "", "stars");

// Check if the form was submitted (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize form inputs
  $username = isset($_POST['username']) ? trim($_POST['username']) : '';  // UserID from form
  $img = isset($_POST['pass']) ? trim($_POST['pass']) : '';            // pic from form

  // Check if both fields are filled
  if (!empty($userid) && !empty($img)) {
      // Insert data into the starinfo table
      $sql = "INSERT INTO users (username, pass) VALUES ('$username', '$pass')";

      if ($conn->query($sql) === TRUE) {
          // Redirect to the same page to prevent re-submission on refresh
          header("Location: " . $_SERVER['PHP_SELF']);
          exit(); // Ensure no further code is executed after redirect
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  } else {
      echo "Both User ID and Image fields must be filled.";
  }
}

// Query to get all data from starinfo table
$sql = "SELECT id, userID, pic FROM starinfo";
$result = $conn->query($sql);

// Display data from the 'starinfo' table
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
      echo "<br><br>ID: " . $row["id"] . " <br>User ID: " . $row["userID"] . " <br>Image: " . $row["pic"] . " <br>";
  }
} else {
  echo "0 results";
}

// Close the connection
$conn->close();
?>