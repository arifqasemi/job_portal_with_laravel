<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class company extends Authenticatable
{
    use HasFactory;
    protected $gaurd =[];
    public function rJob()
    {
        return $this->hasMany(Job::class);
    }
    public function rCompanyIndustry()
    {
        return $this->belongsTo(CompanyIndustry::class, 'company_industry_id');
    }

    public function rCompanyLocation()
    {
        return $this->belongsTo(CompanyLocation::class, 'company_location_id');
    }
}
