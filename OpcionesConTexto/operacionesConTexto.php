<?php

/**
 * Created by PhpStorm.
 * User: lzumarraga
 * Date: 22/10/18
 * Time: 9:38
 */
class operacionesConTexto{

    function contarPalabra($texto){
        if($texto<>""){
            echo "<b> Número de veces que aparece cada letra </b> </br>";
            $data = $texto;

            foreach (count_chars($data, 1) as $i => $val) {
                echo "Se ha encontrado $val vez (ces) de \"" , chr($i) , "\" en el texto.\n ";
                echo "</br>";
            }


        }
    }

    function buscarPalabra($texto, $palabraBuscada){
         if($texto<>"" && $palabraBuscada<>""){
             $Tempvar = $palabraBuscada;
             echo "<b> Indicar las posiciones en que aparece una palabra</b>";
             echo "<p>La palabra $Tempvar aparece en la posición:";
             $str = $texto;
             $array =str_word_count($str, 1);
             echo array_search($palabraBuscada, $array)+1;
         }
    }

    function sustituirPalabra( $texto, $palabra1, $palabra2){
        echo "<b> Cambiar palabras </b> $palabra1 por  $palabra2 </br>";
        str_replace($palabra1, $palabra2, $texto);
        echo $texto;
    }

}