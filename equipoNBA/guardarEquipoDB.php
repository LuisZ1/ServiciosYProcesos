<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "baloncestistas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `Equipos`(`Nombre`) VALUES ([value-1])";

if ($conn->query($sql) === TRUE) {
    echo "Equipo guardado papu";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
