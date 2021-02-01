<?php

namespace App\Http\Requests\LeaveCard;

use Illuminate\Foundation\Http\FormRequest;

class LeaveCardFormRequest extends FormRequest{
    



    public function authorize(){

        return true;
    
    }






    public function rules(){

        return [
            
            'doc_type' => 'sometimes|required|string|max:20',
            'employee_no' => 'sometimes|required|string|max:20',
            'leave_type' => 'sometimes|required|string|max:20',
            'month' => 'sometimes|required|string|max:20',
            'year' => 'sometimes|required|integer|max:3000|min:2000',
            'date' => 'sometimes|required|date_format:"m/d/Y"',
            'date_from' => 'sometimes|required|date_format:"m/d/Y"',
            'date_to' => 'sometimes|required|date_format:"m/d/Y"',
            'days' => 'sometimes|integer|max:360',
            'hrs' => 'sometimes|integer|max:90',
            'mins' => 'sometimes|integer|max:60',

        ];
    
    }





}
