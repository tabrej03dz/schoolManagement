<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function batch(){
        $this->belongsTo(Batch::class);
    }

    public function standard(){
        $this->belongsTo(Standard::class);
    }

    public function student(){
        return $this->hasManyThrough(Student::class, StudentSection::class);
    }
}
