<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;




class ApplicantEducationalBackground extends Model{


    protected $table = 'hr_applicant_educational_background';

	public $timestamps = false;





    protected $attributes = [

        'applicant_id' => '',
        'course' => '',
        'school' => '',
        'units' => '',
        'graduate_year' => '',

    ];





    /** RELATIONSHIPS **/
    public function applicant() {
        return $this->belongsTo('App\Models\Applicant','applicant_id','applicant_id');
    }





}
