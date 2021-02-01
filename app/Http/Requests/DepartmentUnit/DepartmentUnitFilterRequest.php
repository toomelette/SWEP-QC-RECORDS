<?php

namespace App\Http\Requests\DepartmentUnit;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentUnitFilterRequest extends FormRequest{



    public function authorize(){

        return true;
    }

   


    public function rules(){

        return [

            'q' => 'nullable|string|max:90',

        ];

    }




}
