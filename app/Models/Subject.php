<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class, 'subject_id', 'id');
    }
}
