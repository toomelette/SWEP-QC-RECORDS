<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseFilterRequest extends FormRequest{



   
    public function authorize(){

        return true;
    
    }

    



    public function rules(){

        return [
            
            'q' => 'nullable|string|max:90',
            
        ];
    
    }




}
