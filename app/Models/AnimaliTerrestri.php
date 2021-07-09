<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimaliTerrestri extends Model {

    protected $table="animali_terrestri";
    protected $primaryKey="ID_chip";
    public $timestamps = false;

     public function zoo(){
        return $this->belongsTo("App\Models\Zoo");
    }

    public function recinto(){
        return $this->belongsTo("App\Models\Recinti");
    }
    public function specie(){
        return $this->belongsTo("App\Models\specie","specie");
    }
}