<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recinti extends Model {

    protected $table ="recinti";
    protected $primaryKey ="ID";
    public $timestamps = false;


     public function zoo(){
        return $this->belongsTo("App\Models\Zoo");
    }
    public function animali_acquatici(){
        return $this->hasMany("App\Models\AnimaliAcquatici","recinto","ID_chip");
    }
    public function animali_terrestri(){
        return $this->hasMany("App\Models\AnimaliTerrestri","recinto","ID_chip");
    }
}