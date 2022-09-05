<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentInfo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','company_name','position','department','from_date','to_date','status'];
}
