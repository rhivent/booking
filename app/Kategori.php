<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    public function tickets(){
        return $this->hasMany('App\Ticket','id_kategori','id');
    }
}
