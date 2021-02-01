<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Swep\Services\SignatoryService;
use App\Http\Requests\Signatory\SignatoryFormRequest;
use App\Http\Requests\Signatory\SignatoryFilterRequest;


class SignatoryController extends Controller{



    protected $signatory;



    public function __construct(SignatoryService $signatory){

        $this->signatory = $signatory;

    }



    
    public function index(SignatoryFilterRequest $request){

        return $this->signatory->fetch($request);
        
    }




    public function create(){

        return view('dashboard.signatory.create');
        
    }

    


    public function store(SignatoryFormRequest $request){

        return $this->signatory->store($request);
        
    }

   



    public function edit($slug){

        return $this->signatory->edit($slug);
        
    }

    



    public function update(SignatoryFormRequest $request, $slug){

        return $this->signatory->update($request, $slug);
        
    }




    public function destroy($slug){
        
        return $this->signatory->destroy($slug);

    }




}
