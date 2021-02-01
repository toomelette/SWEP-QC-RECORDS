@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Edit Project Code</h1>
      <div class="pull-right" style="margin-top: -25px;">
        {!! __html::back_button(['dashboard.project_code.index']) !!}
      </div>
  </section>

  <section class="content">

    <div class="box">
    
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.project_code.update', $project_code->slug) }}">

        <div class="box-body">
          
          <input name="_method" value="PUT" type="hidden">
      
          @csrf

          {!! __form::select_dynamic(
              '3', 'department_id', 'Department *', old('department_id') ? old('department_id') : $project_code->department_id, $global_departments_all, 'department_id', 'name', $errors->has('department_id'), $errors->first('department_id'), 'select2', ''
          ) !!}

          <input type="hidden" name="department_name" id="department_name" value="{{ old('department_name') ? old('department_name') : $project_code->department_name }}">

          {!! __form::textbox(
             '3', 'project_code', 'text', 'Project Code *', 'Project Code', old('project_code') ? old('project_code') : $project_code->project_code , $errors->has('project_code'), $errors->first('project_code'), ''
          ) !!}

          {!! __form::textbox(
             '6', 'description', 'text', 'Description *', 'Description', old('description') ? old('description') : $project_code->description, $errors->has('description'), $errors->first('description'), ''
          ) !!}

          <div class="col-md-12"></div>
          
          {!! __form::textbox_numeric(
            '3', 'mooe', 'text', 'MOOE:', 'MOOE', old('mooe') ? old('mooe') : $project_code->mooe, $errors->has('mooe'), $errors->first('mooe'), ''
          ) !!}

          {!! __form::textbox_numeric(
            '3', 'co', 'text', 'CO:', 'CO', old('co') ? old('co') : $project_code->co, $errors->has('co'), $errors->first('co'), ''
          ) !!}

          {!! __form::datepicker(
            '3', 'date_started',  'Date Started', old('date_started') ? old('date_started') : $project_code->date_started, '', ''
          ) !!}

          {!! __form::datepicker(
            '3', 'projected_date_end',  'Projected Date End', old('projected_date_end') ? old('projected_date_end') : $project_code->projected_date_end, '', ''
          ) !!}

          {!! __form::textbox(
             '6', 'project_in_charge', 'text', 'Project Incharge', 'Project Incharge', old('project_in_charge') ? old('project_in_charge') : $project_code->project_in_charge, $errors->has('project_in_charge'), $errors->first('project_in_charge'), 'data-transform="uppercase"'
          ) !!}

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-default">Save <i class="fa fa-fw fa-save"></i></button>
        </div>

      </form>

    </div>

  </section>

@endsection




@section('scripts')

  <script type="text/javascript">

    {!! __js::ajax_select_to_input(
      'department_id', 'department_name', '/api/department/textbox_department_ByDepartmentId/', 'name'
    ) !!}

  </script> 
    
@endsection