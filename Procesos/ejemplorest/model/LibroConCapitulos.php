<?php

/**
 * Created by PhpStorm.
 * User: lzumarraga
 * Date: 30/11/18
 * Time: 11:19
 */
class LibroConCapitulos
{

    private $libro;
    private $capitulos;

    /**
     * LibroConCapitulos constructor.
     * @param $libro
     * @param $capitulos
     */

    public function __construct()
    {
        $this->libro = null;
        $this->capitulos = null;
    }


    /**
     * @return mixed
     */
    public function getLibro()
    {
        return $this->libro;
    }

    /**
     * @param mixed $libro
     */
    public function setLibro($libro)
    {
        $this->libro = $libro;
    }

    /**
     * @return mixed
     */
    public function getCapitulos()
    {
        return $this->capitulos;
    }

    /**
     * @param mixed $capitulos
     */
    public function setCapitulos($capitulos)
    {
        $this->capitulos = $capitulos;
    }

}