<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zoo extends Model {

    protected $table="zoo";
    public $timestamps = false;
    protected $primaryKey="ID";

     public function impiego(){
         return $this->hasMany("App\Models\Impiego","zoo");
     }
     public function recinti(){
        return $this->hasMany("App\Models\Recinti","zoo","ID");
    }

}