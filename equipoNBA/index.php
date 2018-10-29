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
    <form action="/action_page.php">
        <fieldset>
            <legend>Personal information:</legend>
            Nombre:<br>
            <input type="text" name="firstname" value="Mickey"><br>
            Apellidos:<br>
            <input type="text" name="lastname" value="Mouse"><br>
            Posicion:<br>
            <input type="text" name="lastname" value="Central"><br>
            Equipo:<br>
            <select>
                <option value="0">Seleccione:</option>
                <?php
                $query = $mysqli -> query ("SELECT Nombre FROM Equipos");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[id].'">'.$valores[paises].'</option>';
                }
                ?>
            </select><br><br>

            <input type="submit" value="Submit">
        </fieldset>
    </form>
</html>