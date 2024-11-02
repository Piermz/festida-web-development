<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyJob extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'type',
        'slug',
        'location',
        'skill_level',
        'salary',
        'thumbnail',
        'about',
        'is_open',
        'company_id',
        'category_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function qualifications(){
        return $this->hasMany(JobQualification::class);
    }
    public function responsibilities(){
        return $this->hasMany(JobResponsibility::class);
    }
    public function job_candidates(){
        return $this->hasMany(JobCandidate::class);
    }
}
