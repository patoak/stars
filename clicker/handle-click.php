
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $clicks = $_POST["clicks"];
    $sql = "INSERT INTO clicker (clicks) VALUES ($clicks)"
}


?>