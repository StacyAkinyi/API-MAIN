<?php

$servername ="127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "api";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get Data from Form
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; 


// 3. Sanitize Input 
$fullname = $conn->real_escape_string($fullname);
$username = $conn->real_escape_string($username);
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 4. Insert into Database
$sql = "INSERT INTO users (fullname, username, email, password)
VALUES ('$fullname', '$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>