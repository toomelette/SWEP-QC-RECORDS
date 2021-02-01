<?php

namespace App\Http\Requests\LeaveCard;

use Illuminate\Foundation\Http\FormRequest;

class LeaveCardFilterRequest extends FormRequest{




    public function authorize(){

        return true;
    }

   


    public function rules(){

        return [

            'q' => 'nullable|string|max:90',
            'emp' => 'nullable|string|max:11',
            'leave_t' => 'nullable|string|max:11',
            'doc_t' => 'nullable|string|max:11',
            'df' => 'nullable|date_format:"m/d/Y"',
            'dt' => 'nullable|date_format:"m/d/Y"',

        ];

    }




}
