<?php

namespace App\Http\Requests\LeaveApplication;

use Illuminate\Foundation\Http\FormRequest;

class LeaveApplicationFormRequest extends FormRequest{




    
    public function authorize(){

        return true;
    }

    



    public function rules(){
            

        $rules = [

            'lastname'=>'required|string|max:90',
            'firstname'=>'required|string|max:90',
            'middlename'=>'required|string|max:90',
            'date_of_filing'=>'required|date_format:"m/d/Y"',
            'position'=>'required|string|max:90',
            'salary'=>'required|string|max:13',
            'immediate_superior'=>'nullable|string|max:90',
            'immediate_superior_position'=>'nullable|string|max:90',
            'type'=>'required|string|max:11',
            'working_days'=>'required|string|max:45',
            'working_days_date_from'=>'nullable|date_format:"m/d/Y"',
            'working_days_date_to'=>'nullable|date_format:"m/d/Y"',
            'commutation'=>'required|string|max:11',

        ];



        if($this->request->get('type') == 'T1001'){

            $rules['type_vacation'] = 'required|string|max:11';

            if($this->request->get('type_vacation') == 'TV1002'){

            	$rules['type_vacation_others_specific'] = 'required|string|max:255';

            }
        }



        if($this->request->get('type') == 'T1004'){

            $rules['type_others_specific'] = 'required|string|max:255';

        }



        if($this->request->get('type') == 'T1001'){

        	$rules['spent_vacation'] = 'required|string|max:11';

            if($this->request->get('spent_vacation') == 'SV1002'){

            	$rules['spent_vacation_abroad_specific'] = 'required|string|max:255';

            }

        }



        if($this->request->get('type') == 'T1002'){

        	$rules['spent_sick'] = 'required|string|max:11';

            if($this->request->get('spent_sick') == 'SS1001'){

            	$rules['spent_sick_inhospital_specific'] = 'required|string|max:255';

            }

            if($this->request->get('spent_sick') == 'SS1002'){

            	$rules['spent_sick_outpatient_specific'] = 'required|string|max:255';

            }

        }


        return $rules;
    

    }









}
