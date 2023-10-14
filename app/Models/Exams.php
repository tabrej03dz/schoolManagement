<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function standard(){
        return $this->belongsTo(Standard::class);
    }
}
