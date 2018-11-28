<?php
/**
 * Created by PhpStorm.
 * User: migue
 * Date: 25/08/16
 * Time: 12:42
 */
require_once "Database.php";
require_once "tabla1.php";

//We also could have done:
//use \Constantes_DB\tabla1;
// And now we can use the class without preceding it with the namespace:
// echo tabla1::COD;

$db = Database::getInstance();
$mysqli = $db->getConnection();
$sql_query = "SELECT ". \Constantes_DB\tabla1::COD . " , "
                      . \Constantes_DB\tabla1::NOMBRE . " , "
                      . \Constantes_DB\tabla1::EDAD . " "
              ." FROM ". \Constantes_DB\tabla1::TABLE_NAME;


$result = $mysqli->query($sql_query);

if ($result->num_rows > 0) {
    echo '<table border=\"1\">';
    echo '<tr>';
    echo '<td>'. \Constantes_DB\tabla1::COD  .'</td>';
    echo '<td>'. \Constantes_DB\tabla1::NOMBRE  .'</td>';
    echo '<td>'. \Constantes_DB\tabla1::EDAD .'</td>';
    echo '</tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'. $row[\Constantes_DB\tabla1::COD]  .'</td>';
        echo '<td>'. $row[\Constantes_DB\tabla1::NOMBRE]  .'</td>';
        echo '<td>'. $row[\Constantes_DB\tabla1::EDAD] .'</td>';
        echo '</tr>';
    }
    echo '</table>';
}


