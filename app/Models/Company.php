<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo',
        'slug',
        'about',
        'employeer_id',
  
    ];
    public function jobs(){
        return $this->hasMany(CompanyJob::class);
    }
    public function employeer(){
        return $this->belongsTo(user::class, 'employeer_id');
    }
}
