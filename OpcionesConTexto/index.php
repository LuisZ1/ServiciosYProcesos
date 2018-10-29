<?php
/**
 * Created by PhpStorm.
 * User: lzumarraga
 * Date: 19/10/18
 * Time: 10:29
 */
?>

<html>
<style>

    ul {
        width: 50%;
    }
    ul li {
        width: 49%;
        display: flex;
    }

    ul li > * {
        width: 100%;
    }

</style>
    <head>
        Actividades con PHP
    </head>
    <body>
        <form action="/officeWord.php" method="post" id="form1">
            <ul>
                <li>
                    <label>Nombre</label>
                    <input type="text" name="name">
                </li>
                <li>
                    <label>Apellidos</label>
                    <input type="text" name="lastname">
                </li>
                <li>
                    <label>Texto</label>
                    <!-- <input type="text" name="texto"> -->
                    <textarea rows="2" cols="20" wrap="soft" form="form1" name="texto"></textarea>
                </li>
                <li>
                    <label>Palabra a buscar</label>
                    <input type="text" name="palabraBuscada">
                </li>
                <li>
                    <label>palabra a cambiar1</label>
                    <input type="text" name="palabracambiar1">
                </li>
                <li>
                    <label>palabra a cambiar2</label>
                    <input type="text" name="palabracambiar2">
                </li>
                <li>
                    <input type="submit" value="Enviar">
                </li>
            </ul>
        </form>
        <!--
        <form action="/officeWord.php" method="post">
            Nombre: <input type="text" name="name"><br>
            Apellidos: <input type="text" name="lastname"><br>
            Texto: <input type="text" name="texto"><br>
            palabra a buscar: <input type="text" name="palabraBuscada"><br>
            palabra a cambiar1: <input type="text" name="palabracambiar1"><br>
            palabra a cambiar2: <input type="text" name="palabracambiar2"><br>
            <input type="submit" value="Enviar">
        </form> -->
    </body>
</html>
