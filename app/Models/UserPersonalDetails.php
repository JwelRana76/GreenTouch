<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPersonalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','fname','lname','father_name','mother_name','date_of_birth','marital_status','gender','nationality','nid',
        'religion','blood_group','present_address','permanent_address','email','primary_mobile','secondary_mobile','computer_skill','career_objective','picture','signature'
    ];
}
