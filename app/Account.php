<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table="account";
    
    public function country(){
        return $this->belongsTo("App\Country");
        //return $this->belongsTo("App\Country","country_id","id");
        //forign key country_id primary key id in country
    }
}
