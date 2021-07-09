<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dipendente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table="dipendente";
    protected $primaryKey="ID";
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

     public function impiego(){
         return $this->hasMany("App\Models\Impiego","dipendente");
     }
     public function dati_anagrafici(){
         return $this->hasOne("\App\Models\DatiAnagrafici","dipendente");
     }
}
