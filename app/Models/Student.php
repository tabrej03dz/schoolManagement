<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function address(){
        $this->belongsTo(StudentAddress::class);
    }

    public function standard(){
        $this->belongsTo(Standard::class);
    }

    public static function boot() {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function (Student $student) {
            $student->roll_number = Str::random(6);
        });
    }

    public function studentSection(){
        $this->hasMany(StudentSection::class);
    }


}
