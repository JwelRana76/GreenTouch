<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','label','degree','board','passing_year','group','cgpa','scale','status'];
}
