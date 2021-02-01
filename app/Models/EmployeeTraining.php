<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class EmployeeTraining extends Model{




    protected $table = 'hr_employee_trainings';

    protected $dates = ['date_from', 'date_to', 'created_at', 'updated_at'];

    public $timestamps = false;
    

    


    protected $attributes = [
        
        'employee_no' => '',
        'slug' => '',
        'title' => '',
        'type' => '',
        'date_from' => null,
        'date_to' => null,
        'hours' => null,
        'conducted_by' => '',
        'venue' => '',
        'remarks' => '',
        'is_relevant' => false,
        'created_at' => null, 
        'updated_at' => null,
        'ip_created' => '',
        'ip_updated' => '',
        'user_created' => '',
        'user_updated' => '',

    ];






    /** RELATIONSHIPS **/
    public function employee() {
    	return $this->belongsTo('App\Models\Employee','employee_no','employee_no');
    }
    




    /** Scopes **/
    public function scopePopulate($query){

        return $query->orderBy('date_to', 'desc')->get();

    }





}
