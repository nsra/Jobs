<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    protected $table="job_seeker";
	public function job()
    {
        return $this->belongsTo("App\Job");
    }
	public function seeker()
    {
        return $this->belongsTo("App\Seeker");
    }
}
