<?php

use App\Models\AnimaliAcquatici;
use App\Models\AnimaliTerrestri;
use App\Models\Dipendente;
use App\Models\Zoo;
use App\Models\Recinti;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class PortaleController extends Controller {

    public function portale() {
        if(session('user_email') != null) {
            return view("portale_dipendenti")->with('csrf_token', csrf_token());
        }
        else {
            return view('login_signup')
            ->with('csrf_token', csrf_token());
        }
    }

    public function tabelle($q=null){
        $email=session('user_email');
        $zoo=Dipendente::where('email',$email)->first()->impiego->where('data_fine',null)->first()->zoo;
        $zoo_nome=Zoo::find($zoo)->nome;
        if(session('zoo')==null)
            Session::put('zoo',$zoo);

        if(!isset($q)){
            $nome=Dipendente::where('email',$email)->first()->dati_anagrafici->nome;
            if($nome) {
                $nome_zoo[] = array('nome'=>$nome, 'zoo'=>$zoo_nome);
                return $nome_zoo;
            }
        }
        else{
            switch($q){
                case 'recinti_out':
                    $recinti=Zoo::find($zoo)->recinti;
                    $array=array();
                    foreach($recinti as $recinto) {
                        $array[] = array('descrizione'=>$recinto->descrizione, 'id'=>$recinto->ID, 
                                         'n_animali'=>$recinto->n_animali, 'tipo'=>$recinto->tipo);
                    }
                    return $array;

                    break;

                case 'animali_acquatici_out':
                    $animali=AnimaliAcquatici::where('zoo',$zoo)->get();
                    $array=array();
                    foreach($animali as $animale){
                        $array[] = array('id'=>$animale->ID_chip, 'specie'=>$animale->specie, 
                                         'data'=>$animale->data_acquisizione, 'tipo'=>$animale->tipo, 
                                         'recinto'=>$animale->recinto);
                    }
                    return $array;
                    break;

                case 'animali_terrestri_out':
                    $animali=AnimaliTerrestri::where('zoo',$zoo)->get();
                    $array=array();
                    foreach($animali as $animale){
                        $array[] = array('id'=>$animale->ID_chip, 'specie'=>$animale->specie, 
                                         'data'=>$animale->data_acquisizione, 'peso'=>$animale->peso, 
                                         'recinto'=>$animale->recinto);
                    }
                    return $array;
                    break;
            }
        }
    }
    public function recinti_in($tipo,$descrizine){
        $recinto=new Recinti;
        $recinto->zoo=session('zoo');
        $recinto->tipo=$tipo;
        $recinto->descrizione=$descrizine;
        $recinto->n_animali=0;
        
        return $recinto->save();
    }

    public function terra_in($specie,$data,$peso,$recinto){
        $animale=new AnimaliTerrestri;
        $animale->data_acquisizione=$data;
        $animale->specie=$specie;
        $animale->recinto=(int)$recinto;
        $animale->peso=(float)$peso;
        $animale->zoo=session('zoo');

        return $animale->save();
    }

    public function acqua_in($specie,$data,$tipo,$recinto){
        $animale=new AnimaliAcquatici;
        $animale->data_acquisizione=$data;
        $animale->specie=$specie;
        $animale->recinto=(int)$recinto;
        $animale->zoo=session('zoo');
        if(!strcmp($tipo,'acqua salata'))
            $animale->tipo=false;
        else
            $animale->tipo=true;
        return $animale->save();
    }




}
?>