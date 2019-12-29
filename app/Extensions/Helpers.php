<?php

namespace App\Extensions;

use Goutte\Client;


class Helpers
{

	public static function saveImage($file, $route, $id = null)
 	{
 		if ($file) {
            if ($file->isValid()) {
		        $path = public_path('images/'.$route.'/');
		        $route_file = $route.'_'.$id."_".$file->getClientOriginalName();
		        $file->move($path, $route_file);

		        return $route_file;
            }
        }
        return false;
    }

	public static function dolar(Client $client)
 	{
		$crawler = $client->request('GET', 'http://www.bna.com.ar/Personas');
		$table   = 'table cotizacion';
		
		$dolar   = $crawler->filter("[class='$table']")->filter('tr')->filter('td')->siblings();
		$dolar   = $dolar->nextAll();
        return $dolar->text();

    }

}