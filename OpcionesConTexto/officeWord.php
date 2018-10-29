<?php include ("operacionesConTexto.php");
$operacionesConTexto = new operacionesConTexto()?>
<html>
    <body>
        <br>
        <p>
            Welcome <?php echo $_POST["name"]; ?></br>
            Your lastname is: <?php echo $_POST["lastname"]; ?> </br>
            Tu texto es: <?php echo $_POST["texto"]; ?> </br>
        </p>


        <!-- Indicar el número de veces que aparece una palabra -->
        <?php $operacionesConTexto->contarPalabra($_POST["texto"])?>
        </br></br>

        <!-- Indicar las posiciones en que aparece una palabra -->
        <?php $operacionesConTexto->buscarPalabra($_POST["texto"], $_POST["palabraBuscada"]) ?>
        </br></br>

        <!-- Sustituir una palabra por otra -->
        <?php $operacionesConTexto->sustituirPalabra($_POST["texto"], $_POST["palabracambiar1"],$_POST["palabracambiar2"]) ?>

        </br></br>
        <!-- Sustituir la palabra de la posición x por la de la posición y -->

    </body>
</html>

