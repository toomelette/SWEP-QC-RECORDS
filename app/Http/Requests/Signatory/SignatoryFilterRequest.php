<?php

namespace App\Http\Requests\Signatory;

use Illuminate\Foundation\Http\FormRequest;

class SignatoryFilterRequest extends FormRequest{


   public function authorize(){

        return true;
    }

   


    public function rules(){

        return [

            'q' => 'nullable|string|max:90',

        ];

    }




    
}
