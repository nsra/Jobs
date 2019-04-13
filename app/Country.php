<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table="country";
    
    public function accounts(){
        return $this->hasMany("App\Account");
    }
}
