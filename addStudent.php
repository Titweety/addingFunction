<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);

    $sql = "INSERT INTO students (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Student Added</h1>";
        echo "<p>Name: " . $name . "</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<h1>No student data submitted.</h1>";
}

$conn->close();
?>