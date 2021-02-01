<?php

namespace App\Http\Requests\Document;

use Illuminate\Foundation\Http\FormRequest;

class DocumentFilterRequest extends FormRequest{
    





    public function authorize(){

        return true;
    
    }

    



    public function rules(){

        return [
            
            'q' => 'nullable|string|max:255',
            'fc' => 'nullable|string|max:45',
            'dct' => 'nullable|string|max:45',
            'df' => 'nullable|date_format:"m/d/Y"',
            'dt' => 'nullable|date_format:"m/d/Y"',
            
        ];
    
    }





}
