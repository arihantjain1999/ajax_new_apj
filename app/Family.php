<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'name',
        'surname',
    ];    
    public function student()
    {       
        return $this->belongsTo(Student::class);
    }
}
