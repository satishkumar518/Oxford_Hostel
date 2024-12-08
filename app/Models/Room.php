<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded =[];

    // relation with student table
    public function students(){
        return this->belongToMany(Student::class, 'bookrooms');
    }
}
