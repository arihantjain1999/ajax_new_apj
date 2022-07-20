<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\HasFactory ;

class Student extends Model
{
    // use HasFactory ;
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'dob',
    ];    
    public function family()
    {
        return $this->hasMany(Family::class);
    }
    public function subject()
    {
        return $this->belongsToMany(Subject::class);
    }
}
