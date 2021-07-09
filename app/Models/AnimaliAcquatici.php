<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimaliAcquatici extends Model {

    protected $table="animali_acquatici";
    protected $primaryKey="id_chip";
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