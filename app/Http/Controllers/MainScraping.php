<?php

namespace App\Http\Controllers;

use ArrayObject;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade as Goutte;


class MainScraping extends Controller
{

    function getListColleges()
    {
//prueba de vendor
//        $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
//        $crawler->filter('.result__title .result__a')->each(function ($node) {
//            dump($node->text());
//        });
        $collegesList = $this->getColleges();

        $crawler = Goutte::request('GET', $collegesList[0]['link']);

        $ofertas = $crawler->filter('.tabla-nomina tr')->each(function ($node) {

            return $results = $node->filter('td')->extract( array( '_text' ) );

        });

        foreach ($ofertas as $oferta){


            if(count($oferta) == 1){
                //return $oferta[0];
            }
            if(count($oferta) == 11){
                dump ($oferta);
            }
        }


        //return response()->json($ofertas);
    }


    private function getColleges(){

        $colleges = null;

        $crawler = Goutte::request('GET', 'http://www.psu.demre.cl/postulacion/carreras-requisitos-vacantes-y-ponderaciones-p2019/');
        $colleges = $crawler->filter('.universidades-rendicion ul li')->each(function ($node) {
            return $array = [

                'image' => str_replace('../../', 'http://www.psu.demre.cl/', $node->filter('img')->attr('src')) . '',
                'name' => $node->filter('.nombre-universidad')->text(),
                'link' => str_replace('../', 'http://www.psu.demre.cl/postulacion/', $node->filter('.perfil-universidad a')->attr('href')),

            ];
        });

        return $colleges;
    }
}
