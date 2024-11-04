<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'slug',
        'about',
        'employer_id',
    ];
    public function jobs(){
        return $this->hasMany(CompanyJob::class);
    }
    public function employer(){
        return $this->belongsTo(user::class, 'employer_id');
    }
}
