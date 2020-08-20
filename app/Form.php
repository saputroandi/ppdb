<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'name','user_id','gender','photo','date_of_birth','born','religion','name_of_father','name_of_mother','phone_number_1','phone_number_2','province','district','sub_district','urban_village','address','zip_code','from_jhs','nisn','no_kk','nik_of_student','nik_of_father','nik_of_mother','father_occupation','mother_occupation','majors_interest_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function majorinterest()
    {
        return $this->belongsTo(MajorInterest::class);
    }
}
