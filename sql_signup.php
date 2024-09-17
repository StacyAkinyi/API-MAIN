<?php

$servername ="127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "api";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}


$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
//Prepare and Execute Insert Query
try {
    $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (:fullname, :username, :email, :hashed_password)");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hashed_password', $hashed_password);
    $stmt->execute();

    if ($stmt->execute()) {
        // Get the last inserted ID 
        $last_id = $conn->lastInsertId();

        // Fetch the newly inserted record
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :last_id");
        $stmt->bindParam(':last_id', $last_id);
        $stmt->execute();
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display the user data
        echo "<h2>User Data:</h2>";
        echo "<p>Full Name: " . $user_data['fullname'] . "</p>";
        echo "<p>Username: " . $user_data['username'] . "</p>";
        echo "<p>Email: " . $user_data['email'] . "</p>";
        // Do NOT display the password!
    } else {
        echo "Error: " . $e->getMessage();
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$conn = null;
?>