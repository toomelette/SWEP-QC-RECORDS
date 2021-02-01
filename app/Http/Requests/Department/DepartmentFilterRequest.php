<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentFilterRequest extends FormRequest{



    public function authorize(){

        return true;
    }

   


    public function rules(){

        return [

            'q' => 'nullable|string|max:90',

        ];

    }





}
