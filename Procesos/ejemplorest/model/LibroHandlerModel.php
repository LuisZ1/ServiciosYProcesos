<?php

require_once "ConsLibrosModel.php";
require_once "LibroConCapitulos.php";


class LibroHandlerModel
{

    public static function getLibro($id, $query_string = null)
    {
        $listaLibrosCap = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $query = null;
        $minpag = null;
        $maxpag = null;

        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true || $id == null) {
            $query = "SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                . \ConstantesDB\ConsLibrosModel::TITULO . ","
                . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME;
            if ($query_string == null) {
                if ($id != null) {
                    $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";
                }
            } else {
                if (isset($query_string['minpag']) && isset($query_string['maxpag'])) {
                    $minpag = $query_string['minpag'];
                    $maxpag = $query_string['maxpag'];
                    //select con las dos, primero min y luego max
                    $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::PAGS . " BETWEEN " . $minpag . " AND " . $maxpag;
                } else {
                    if (!isset($query_string['minpag']) && isset($query_string['maxpag'])) {
                        //Select solo con la maxima
                        $maxpag = $query_string['maxpag'];
                        $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::PAGS . " < " . $maxpag;
                    } else {
                        if (isset($query_string['minpag']) && !isset($query_string['maxpag'])) {
                            //Select solo con la minima
                            $minpag = $query_string['minpag'];
                            $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::PAGS . " > " . $minpag;
                        }
                    }
                }
            }

            //--------------------------------------------------------
            $prep_query = $db_connection->prepare($query);

            if ($id != null) {
                $prep_query->bind_param('s', $id);
                if (isset($query_string['minpag']) && isset($query_string['maxpag'])) {
                    $prep_query->bind_param('sii', $id, $minpag, $maxpag);
                } else {
                    if (!isset($query_string['minpag']) && isset($query_string['maxpag'])) {
                        $prep_query->bind_param('si', $id, $maxpag);
                    } else {
                        if (isset($query_string['minpag']) && !isset($query_string['maxpag'])) {
                            $prep_query->bind_param('si', $id, $minpag);
                        }
                    }
                }
            }

            $prep_query->execute();
            $listaLibrosCap = array();


            $prep_query->bind_result($cod, $tit, $pag);

            while ($prep_query->fetch()) {
                $tit = utf8_encode($tit);

                $query = "SELECT " . \ConsCapitulosModel::ID_CAP . "," . \ConsCapitulosModel::PAG_INI . ","
                    . \ConsCapitulosModel::PAG_FIN . " FROM " . \ConsCapitulosModel::TABLE_NAME
                    . " WHERE codigoLibro = ?";

                $prep_query->prepare($query);
                $prep_query->bind_param('i', $id);
                $prep_query->execute();

                $capitulos = array();
                $result = $prep_query->get_result();

                $prep_query->bind_result($idCap, $ipag, $fpag);
                while ($row = $result->fetch_assoc()) {
                    $capitulo = new CapituloModel($id, $idCap, $ipag, $fpag);
                    $capitulos[] = $capitulo;
                }

                $libro = new LibroModel ($cod, $tit, $pag);
                $LibroCap = new LibroConCapitulos();
                $LibroCap -> setLibro($libro);
                $LibroCap -> setCapitulos($capitulos);
                $listaLibrosCap[] = $LibroCap;
            }
        }
        $db_connection->close();

//        return $listaLibrosCap;
        return sizeof($listaLibrosCap) == 1 ? $listaLibrosCap[0] : $listaLibrosCap;
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

        $prep_query->bind_param("si", $libro->titulo, $libro->numpag);

        $prep_query->execute();

        $filas = $prep_query->affected_rows;

        $db_connection->close();

        return $filas;
    }

    public static function deleteLibro($id)
    {

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $filasAfectadas = 0;


        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true) {
            $query = "DELETE FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME .
                " WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";


            $prep_query = $db_connection->prepare($query);

            $prep_query->bind_param('i', $id);

            $prep_query->execute();

            $filasAfectadas = $prep_query->affected_rows;

        }
        $db_connection->close();

        return $filasAfectadas;
    }

    public static function putLibro($libro)
    {
        $filas = 0;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $query = "UPDATE libros SET titulo = ?, numpag = ? WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";

        $prep_query = $db_connection->prepare($query);

        $prep_query->bind_param("sii", $libro->titulo, $libro->numpag, $libro->codigo);

        $prep_query->execute();

        $filas = $prep_query->affected_rows;

        $db_connection->close();

        return $filas;
    }

}