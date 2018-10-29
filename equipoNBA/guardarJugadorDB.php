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

$sql = "INSERT INTO `Jugadores`( `Nombre`, `Apellidos`, `Posicion`, `ID_Equipo`) 
        VALUES ([value-1],[value-2],[value-3],[value-4])";

if ($conn->query($sql) === TRUE) {
    echo "Jugador guardado papi";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
