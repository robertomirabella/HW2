<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatiAnagrafici extends Model {

    protected $table="dati_anagrafici";
    public $timestamps = false;
    protected $primaryKey="dipendente";

    public function dipendente(){
        return $this->belongsTo("App\Models\Dipendente",'dipendente',null);
    }
}