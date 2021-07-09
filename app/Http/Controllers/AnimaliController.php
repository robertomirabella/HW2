<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

use App\Models\Specie;

class AnimaliController extends Controller {

    public function preferiti($tipo,$value = null){
        if(!isset($tipo)){
            echo "Non dovresti essere qui";
            exit;
        }
        //session_start();
        //header('Content-Type: application/json');
        if(session('preferiti')==null)
            Session::put('preferiti', '');
        
        switch($tipo){
            case 'aggiungi':
                Session::put('preferiti', session('preferiti').$value.'|');
                break;
            case 'rimuovi':
                Session::put('preferiti', str_replace( $value.'|' , '' , session('preferiti')));
                break;
            case 'carica':
                if(session('preferiti')!=''){
                    $array = array();
                    $array = explode('|',session('preferiti'));
                    return($array);
                }
                else return array('exists' => false);
                break;
        }
    }

    public function caricaAnimali() {
        $specie = Specie::all();
        return $specie;
    }
    
    public function token() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.petfinder.com/v2/oauth2/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        //body e header della richiesta
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id='. env('PET_CLIENT_ID').'&client_secret='.env('PET_CLIENT_SECRET')); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded')); 
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);

        return ($token);
    }
}
?>