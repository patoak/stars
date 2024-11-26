<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get info from db & output it</title>
</head>
<body>
  

<?php 

$x = 4;
echo "<p>$x</p>";

//Array ( [0] => 6 [1] => 8 [2] => 10 )
$masivs = [6, 8, 10];
print_r($masivs);
echo "<br>";

//Array ( [Age] => 6 [avg grade] => 8 [ids] => 10 )
$assoc_masivs=["Age" => 6, "avg grade" => 8, "ids" => 10];
print_r($assoc_masivs);

echo "<br><br>";


echo "<form method='POST'>";
echo "<label>Username: <input name='username' /></label><br>";
echo "<label>Password: <input name='password' type='password'><br>";
echo "<input type='submit' value='Add'>";
echo "</form>";
echo "<br><br><br>";

// Establish the database connection
$conn = new mysqli ("127.0.0.1", "root", "", "stars");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the submitted values from the form
  $username = isset($_POST['username']) ? trim($_POST['username']) : '';  
  $password = isset($_POST['password']) ? trim($_POST['password']) : '';           

  // Check if both fields are filled
  if (!empty($username) && !empty($password)) {
    // Insert data into the table
    $sql = "INSERT INTO users (username, pass) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
      // Redirect to the same page to prevent resubmission
      header("Location: " . $_SERVER['PHP_SELF']);
      exit(); // Ensure no further code execution
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "<br>Both fields (Username and Password) must be filled.";
  }
}

// Output the list of users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]. " <br>Username: " . $row["username"]. " <br>Password: " . $row["pass"]. " <br><br>";
  }
} else {
  echo "0 results";
}

$conn->close();

echo "<br><br>";


?>

</body>
</html>
