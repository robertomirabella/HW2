<?php

use Illuminate\Routing\Controller;
use App\Models\Zoo;

class ZooController extends Controller {

    public function meteo($q){
        $url = 'https://api.openweathermap.org/data/2.5/weather?'.$q.'&lang=it&units=metric&appid='. env('METEO_APIKEY');
        
        $ch = curl_init($url);
        // faccio ritornare il valore
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //invio la richiesta
        $data = curl_exec($ch);
        $json = json_decode($data, true);
        curl_close($ch);

        return ($json);
    }

    public function caricaZoo() {
        $zoo = Zoo::all();
        return $zoo;
    }
}
?>