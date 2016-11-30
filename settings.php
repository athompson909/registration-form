<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registration_data";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
  die("Connection failed: ".$conn->connect_error);
}

$sql = "INSERT INTO RegistrationData (firstname, lastname, email, phone) VALUES ('$firstname', '$lastname', '$email', '$phone')";

if($conn->query($sql) == TRUE) {
  echo "created new record";
}

$conn->close();

?>
