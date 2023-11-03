<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'dob',
        'gender',
        'citizenship',
        'national_id',
        'birth_certificate',
        'passport_photo',
        'county_of_birth',
        'sub_county',
        'ward',
        'residency_area',
        'index_number',
        'year_of_exam',
        'marks_attained',
        'primary_school',
        'father_name',
        'mother_name',
        'guardian_name',
        'relationship',
        'email',
        'sport',
        'contributions',
        'sub_chief_name',
        'address',
        'chief_contact',
        'score',
        'created_at',

    ];
}
