<?php

require_once "ConsLibrosModel.php";


class LibroHandlerModel
{

    public static function getLibro($id, $query_string=null)
    {
        $listaLibros = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $query = null;

        //IMPORTANT: we have to be very careful about automatic data type conversions in MySQL.
        //For example, if we have a column named "cod", whose type is int, and execute this query:
        //SELECT * FROM table WHERE cod = "3yrtdf"
        //it will be converted into:
        //SELECT * FROM table WHERE cod = 3
        //That's the reason why I decided to create isValid method,
        //I had problems when the URI was like libro/2jfdsyfsd

        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true || $id == null ) {
            $query = "SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                . \ConstantesDB\ConsLibrosModel::TITULO . ","
                . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME;
            if($query_string == null){
                if ($id != null) {
                    $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";
                }
            }else{
                if(isset($query_string['minpag'])||isset($query_string['maxpag'])){
                    //select con las dos, primero min y luego max
                    $query = $query . " AND ";
                }else{
                    if(!isset($query_string['minpag'])||isset($query_string['maxpag'])){
                        //Select solo con la maxima
                    }else{
                        if(isset($query_string['minpag'])||!isset($query_string['maxpag'])){
                            //Select solo con la minima
                        }
                    }
                }
            }






            //--------------------------------------------------------
            $prep_query = $db_connection->prepare($query);

            if ($id != null) {
                $prep_query->bind_param('s', $id);
            }

            $prep_query->execute();
            $listaLibros = array();

            $prep_query->bind_result($cod, $tit, $pag);
            while ($prep_query->fetch()) {
                $tit = utf8_encode($tit);
                $libro = new LibroModel($cod, $tit, $pag);
                $listaLibros[] = $libro;
            }
        }
        $db_connection->close();

        return $listaLibros;
    }

    /*returns true if $id is a valid id for a book
    In this case, it will be valid if it only contains
    numeric characters, even if this $id does not exist in
     the table of books */
    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

    public static function postLibro($libro)
    {
        $filas = 0;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $query = "INSERT INTO libros (titulo, numpag) VALUES (?,?)";

        $prep_query = $db_connection->prepare($query);

        $prep_query->bind_param("si",  $libro->titulo, $libro->numpag);

        $prep_query->execute();

        $filas = $prep_query->affected_rows;

        $db_connection->close();

        return $filas;
    }

    public static function deleteLibro($id){

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $filasAfectadas = 0;


        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true ) {
            $query = "DELETE FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME.
                " WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";


            $prep_query = $db_connection->prepare($query);

            $prep_query->bind_param('i', $id);

            $prep_query->execute();

            $filasAfectadas = $prep_query->affected_rows;

        }
        $db_connection->close();

        return $filasAfectadas;
    }

    public static function putLibro($libro){
        $filas = 0;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $query = "UPDATE libros SET titulo = ?, numpag = ? WHERE ". \ConstantesDB\ConsLibrosModel::COD . " = ?";

        $prep_query = $db_connection->prepare($query);

        $prep_query->bind_param("sii",  $libro->titulo, $libro->numpag, $libro->codigo);

        $prep_query->execute();

        $filas = $prep_query->affected_rows;

        $db_connection->close();

        return $filas;
    }

}