<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['id_ticket','qty','status_ticket'];

    public function ticket(){
        return $this->belongsTo('App\Ticket','id_ticket');
    }
    
}
