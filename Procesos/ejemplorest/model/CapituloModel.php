<?php

/**
 * Created by PhpStorm.
 * User: lzumarraga
 * Date: 30/11/18
 * Time: 9:22
 */
class CapituloModel implements JsonSerializable
{

    private $codigoLibro;
    private $idCapitulo;
    private $paginaInicial;
    private $paginaFinal;

    /**
     * CapituloModel constructor.
     * @param $codigoLibro
     * @param $idCapitulo
     * @param $paginaInicial
     * @param $paginaFinal
     */
    public function __construct($codigoLibro, $idCapitulo, $paginaInicial, $paginaFinal)
    {
        $this->codigoLibro = $codigoLibro;
        $this->idCapitulo = $idCapitulo;
        $this->paginaInicial = $paginaInicial;
        $this->paginaFinal = $paginaFinal;
    }

    /**
     * @return mixed
     */
    public function getCodigoLibro()
    {
        return $this->codigoLibro;
    }

    /**
     * @param mixed $codigoLibro
     */
    public function setCodigoLibro($codigoLibro)
    {
        $this->codigoLibro = $codigoLibro;
    }

    /**
     * @return mixed
     */
    public function getIdCapitulo()
    {
        return $this->idCapitulo;
    }

    /**
     * @param mixed $idCapitulo
     */
    public function setIdCapitulo($idCapitulo)
    {
        $this->idCapitulo = $idCapitulo;
    }

    /**
     * @return mixed
     */
    public function getPaginaInicial()
    {
        return $this->paginaInicial;
    }

    /**
     * @param mixed $paginaInicial
     */
    public function setPaginaInicial($paginaInicial)
    {
        $this->paginaInicial = $paginaInicial;
    }

    /**
     * @return mixed
     */
    public function getPaginaFinal()
    {
        return $this->paginaFinal;
    }

    /**
     * @param mixed $paginaFinal
     */
    public function setPaginaFinal($paginaFinal)
    {
        $this->paginaFinal = $paginaFinal;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return array(
            'codigoLibro' => $this->codigoLibro,
            'idCapitulo' => $this->idCapitulo,
            'paginaInicial' => $this->paginaInicial,
            'paginaFinal' => $this->paginaFinal
        );
    }

    public function __sleep(){
        return array( 'codigoLibro', 'idCapitulo', 'paginaInicial', 'paginaFinal');
    }
}