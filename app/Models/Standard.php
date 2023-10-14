<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function teacher(){
        return $this->hasMany(Teacher::class);
    }

    public function subject(){
        return $this->hasMany(Subject::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }

}
