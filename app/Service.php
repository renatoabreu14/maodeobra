<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'nome'
    ];

    public function users(){
        return $this->belongsToMany('App\User', 'user_services');
    }
}
