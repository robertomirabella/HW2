<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model {

    protected $table="specie";
    protected $primaryKey="specie";
    protected $autoIncrement=false;
    protected $keyType = 'string';
    public $timestamps = false;

     public function animaliAcquatici(){
        return $this->hasMany("App\Models\AnimaliAcquatici","specie","ID_chip");
    }
    public function animaliTerrestri(){
       return $this->hasMany("App\Models\AnimaliTerrestri","specie","ID_chip");
   }
}