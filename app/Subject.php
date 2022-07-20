<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject',
    ];
    
    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
