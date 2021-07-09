<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impiego extends Model {

    protected $table="impiego";
    public $timestamps = false;
    protected $primaryKey = ['dipendente', 'zoo','data_inizio'];
    public $incrementing = false;

     public function dipendente(){
         return $this->belongsTo("App\Models\Dipendente",'dipendente');
     }
     public function zoo(){
        return $this->belongsTo("App\Models\Zoo","zoo");
    }
}