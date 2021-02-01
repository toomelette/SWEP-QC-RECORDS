<?php

namespace App\Http\Controllers;

use App\Swep\Services\PermissionSlipService;
use App\Http\Requests\PermissionSlip\PermissionSlipFormRequest;
use App\Http\Requests\PermissionSlip\PermissionSlipFilterRequest;
use App\Http\Requests\PermissionSlip\PermissionSlipReportRequest;



class PermissionSlipController extends Controller{



	protected $permission_slip;



    public function __construct(PermissionSlipService $permission_slip){

        $this->permission_slip = $permission_slip;

    }




    public function index(PermissionSlipFilterRequest $request){

        return $this->permission_slip->fetch($request);
    
    }

    


    public function create(){

        return view('dashboard.permission_slip.create');

    }

    


    public function store(PermissionSlipFormRequest $request){

       return $this->permission_slip->store($request);
        
    }




    public function show($slug){

       return $this->permission_slip->show($slug);
        
    }




    public function edit($slug){

       return $this->permission_slip->edit($slug);
        
    }




    public function update(PermissionSlipFormRequest $request, $slug){

        return $this->permission_slip->update($request, $slug);

    }

    


    public function destroy($slug){

       return $this->permission_slip->destroy($slug); 

    }

    


    public function report(){

       return view('dashboard.permission_slip.report');

    }

    


    public function reportGenerate(PermissionSlipReportRequest $request){

       return $this->permission_slip->reportGenerate($request);

    }




    
}
