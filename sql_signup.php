<?php
// 1. Connect to Database
$servername = "localhost";
$username = "root";
$password = "Bambino.0";
$dbname = "api";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// 2. Get Data from Form
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// 3. Prepare and Execute Insert Query
try {
    $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (:fullname, :username, :email, :hashed_password)");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    echo "New record created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>