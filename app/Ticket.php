<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo('App\Kategori','id_kategori');
    }
}
