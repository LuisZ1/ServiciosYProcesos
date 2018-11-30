<?php

/**
 * Created by PhpStorm.
 * User: lzumarraga
 * Date: 30/11/18
 * Time: 9:43
 */
class CapituloController
{

    public function manageGetVerb(Request $request){

        $listaCapitulos = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }

        $listaCapitulos = CapituloHandlerModel::getCapitulo($id);

        if ($listaCapitulos != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (CapituloHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaCapitulos, $request->getAccept());
        $response->generate();

    }

    public function managePostVerb(Request $request){

        $capitulo = $request->getBodyParameters();

        $response = null;
        $code = null;
        $filasAfectadas = null;

        $filasAfectadas = CapituloHandlerModel::postCapitulo($capitulo);

        if ($filasAfectadas != null) {
            $code = '200';
        } else {
            $code = '404';
        }

        $response = new Response($code, null, null, $request->getAccept());
        $response->generate();

    }

    public function managePutVerb(Request $request){

        $capitulo = $request->getBodyParameters();

        $response = null;
        $code = null;
        $filasAfectadas = null;

        $filasAfectadas = CapituloHandlerModel::putCapitulo($capitulo);

        if ($filasAfectadas != null) {
            $code = '200';
        } else {
            $code = '404';
        }

        $response = new Response($code, null, null, $request->getAccept());
        $response->generate();
    }

    public function manageDeleteVerb(Request $request){

        $id = null;
        $response = null;
        $code = null;
        $filasAfectadas = null;

        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }

        $filasAfectadas = CapituloHandlerModel::deleteCapitulo($id);

        if ($filasAfectadas != null) {
            $code = '200';
        } else {
            $code = '400';
        }

        $response = new Response($code, null, null, $request->getAccept());
        $response->generate();

    }

}