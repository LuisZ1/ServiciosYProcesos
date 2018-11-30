<?php

/**
 * Created by PhpStorm.
 * User: lzumarraga
 * Date: 30/11/18
 * Time: 9:28
 */
class CapituloHandlerModel
{

    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

    public static function getCapitulo($id)
    {
        $listaCapitulos = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $query = null;

        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true || $id == null) {
            $query = "SELECT " . \ConsCapitulosModel::COD_LIB . "," . \ConsCapitulosModel::ID_CAP . ","
                . \ConsCapitulosModel::PAG_INI . ","
                . \ConsCapitulosModel::PAG_FIN . " FROM " . \ConsCapitulosModel::TABLE_NAME;
            if ($id != null) {
                $query = $query . " WHERE " . \ConsCapitulosModel::ID_CAP . " = ?";
            }
        }

        //--------------------------------------------------------
        $prep_query = $db_connection->prepare($query);

        if ($id != null) {
            $prep_query->bind_param('i', $id);
        }

        $prep_query->execute();
        $listaCapitulos = array();

        $prep_query->bind_result($codigoLibro, $idCapitulo, $paginaInicial, $paginaFinal);
        while ($prep_query->fetch()) {
            $capitulo = new CapituloModel($codigoLibro, $idCapitulo, $paginaInicial, $paginaFinal);
            $listaCapitulos[] = $capitulo;
        }


        $db_connection->close();

        return sizeof($listaCapitulos) == 1 ? $listaCapitulos[0] : $listaCapitulos;

    }

    public static function postCapitulo($capitulo)
    {
        $filas = 0;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $query = "INSERT INTO" . \ConsCapitulosModel::TABLE_NAME . " VALUES ?,?,?,?)";

        $prep_query = $db_connection->prepare($query);

        $prep_query->bind_param("iiii", $capitulo->codigoLibro, $capitulo->idCapitulo, $capitulo->paginaInicial, $capitulo->paginaFinal);

        $prep_query->execute();

        $filas = $prep_query->affected_rows;

        $db_connection->close();

        return $filas;
    }

    public static function deleteCapitulo($id) //Puede que borre los cap de todos los libros cuyo id coincida
    {

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();
        $filasAfectadas = 0;


        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true) {
            $query = "DELETE FROM " . \ConsCapitulosModel::TABLE_NAME .
                " WHERE " . \ConsCapitulosModel::ID_CAP . " = ? ";


            $prep_query = $db_connection->prepare($query);

            $prep_query->bind_param('i', $id);

            $prep_query->execute();

            $filasAfectadas = $prep_query->affected_rows;
        }
        $db_connection->close();

        return $filasAfectadas;
    }

    public static function putCapitulo($capitulo)
    {
        $filas = 0;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $query = "UPDATE ".\ConsCapitulosModel::TABLE_NAME." SET ". \ConsCapitulosModel::PAG_INI ." = ?, "
            . \ConsCapitulosModel::PAG_FIN . "  = ? WHERE ". \ConsCapitulosModel::ID_CAP . " = ? AND ". \ConsCapitulosModel::COD_LIB . " = ?" ;

        $prep_query = $db_connection->prepare($query);

        $prep_query->bind_param("iiii", $capitulo->paginaInicial, $capitulo->paginaFinal, $capitulo->idCapitulo, $capitulo->codigoLibro);

        $prep_query->execute();

        $filas = $prep_query->affected_rows;

        $db_connection->close();

        return $filas;
    }

}