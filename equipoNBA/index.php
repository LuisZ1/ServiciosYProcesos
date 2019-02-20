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
?>
<html>
<form action="/guardarJugadorDB.php">
    <fieldset>
        <legend>Personal information:</legend>
        Nombre:<br>
        <input type="text" name="firstname" value="Mickey"><br>
        Apellidos:<br>
        <input type="text" name="lastname" value="Mouse"><br>
        Posicion:<br>
        <input type="text" name="equipo" value="Central"><br>
        Equipo:<br>

        <select>
            <option value="0" >Seleccione:</option>
            <?php
            $sql = "SELECT Nombre FROM Equipos";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    //echo '<option value=\"' . $row["Nombre"] . '\"/>';
                    echo '<option name ="id_Equipo" value="'.$row["Nombre"].'">'. $row["Nombre"] .'</option>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </select>

        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>
</html>