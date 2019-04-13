<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table='job';

    public function jobtype()
    {
        return $this->belongsTo("App\JobType","job_type_id","id");
    }
    public function category()
    {
        return $this->belongsTo("App\Category");
    }
    public function company()
    {
        return $this->belongsTo("App\Company");
    }
}
