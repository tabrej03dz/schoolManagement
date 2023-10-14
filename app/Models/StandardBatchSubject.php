<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardBatchSubject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function standard(){
        return $this->belongsTo(Standard::class, 'standard_id');
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
