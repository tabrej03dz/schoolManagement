<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function standard(){
        $this->belongsTo(Standard::class);
    }

    public function standardBatchSubject(){
        $this->hasMany(StandardBatchSubject::class);
    }
}
