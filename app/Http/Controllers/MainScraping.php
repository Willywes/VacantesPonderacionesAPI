<?php

namespace App\Http\Controllers;

use ArrayObject;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade as Goutte;


class MainScraping extends Controller
{

    function getListColleges()
    {

//        $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
//        $crawler->filter('.result__title .result__a')->each(function ($node) {
//            dump($node->text());
//        });
        $colleges = null;

        $crawler = Goutte::request('GET', 'http://www.psu.demre.cl/postulacion/carreras-requisitos-vacantes-y-ponderaciones-p2019/');
        $colleges = $crawler->filter('.universidades-rendicion ul li ')->each(function ($node) {

            return $array = [

                'image' => str_replace('../../', 'http://www.psu.demre.cl/', $node->filter('img')->attr('src')) . '',
                'name' => $node->filter('.nombre-universidad')->text()

            ];


        });

        return response()->json($colleges);
    }
}
