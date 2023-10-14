<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function exam(){
        return $this->belongsTo(Exams::class);
    }
}
