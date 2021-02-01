<?php

  $table_sessions = [
                      Session::get('EMPLOYEE_UPDATE_SUCCESS_SLUG')
                    ];

  $appended_requests = [
                        'q'=> Request::get('q'),
                        'sort' => Request::get('sort'),
                        'direction' => Request::get('direction'),
                        'e' => Request::get('e'),

                        'a' => Request::get('a'),
                        'd' => Request::get('d'),
                      ];

  $span_user_not_exist = '<span class="text-red"><b>User does not exist!</b></span>';

?>





@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Employee List</h1>
  </section>

  <section class="content">
    
    {{-- Form Start --}}
    <form data-pjax class="form" id="filter_form" method="GET" autocomplete="off" action="{{ route('dashboard.employee.index') }}">

    {{-- Advance Filters --}}
    {!! __html::filter_open() !!}

      {!! __form::select_dynamic_for_filter(
        '2', 'd', 'Department', old('d'), $global_departments_all, 'department_id', 'name', 'submit_emp_filter', '', ''
      ) !!}

      {!! __form::select_static_for_filter(
        '2', 'a', 'Status', old('a'), ['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'], 'submit_emp_filter', '', ''
      ) !!}

    {!! __html::filter_close('submit_emp_filter') !!}


    <div class="box" id="pjax-container" style="overflow-x:auto;">

      {{-- Table Search --}}        
      <div class="box-header with-border">
        {!! __html::table_search(route('dashboard.employee.index')) !!}
      </div>

    {{-- Form End --}}  
    </form>

      {{-- Table Grid --}}        
      <div class="box-body no-padding">
        <table class="table table-hover">
          <tr>
            <th>@sortablelink('employee_no', 'Employee No.')</th>
            <th>@sortablelink('fullname', 'Fullname')</th>
            <th>@sortablelink('position', 'Position')</th>
            <th>@sortablelink('email', 'Email')</th>
            <th style="width: 150px">Action</th>
          </tr>
          @foreach($employees as $data) 

            <tr {!! __html::table_highlighter( $data->slug, $table_sessions) !!} >
              
              <td id="mid-vert">{{ $data->employee_no }}</td>
              <td id="mid-vert">{{ $data->fullname }}</td>
              <td id="mid-vert">{{ $data->position }}</td>
              <td style="width: 20%">{{ $data->email }}</td>
              <td>
                <select id="action" class="form-control input-md">
                  <option value="">Select</option>
                  <option data-type="1" data-url="{{ route('dashboard.employee.show', $data->slug) }}">Details</option>
                  <option data-type="1" data-url="{{ route('dashboard.employee.service_record', $data->slug) }}">Service Record</option>
                  <option data-type="1" data-url="{{ route('dashboard.employee.training', $data->slug) }}">Trainings</option>
                  <option data-type="1" data-url="{{ route('dashboard.employee.matrix_show', $data->slug) }}">Matrix</option>
                  <option data-type="1" data-url="{{ route('dashboard.employee.edit', $data->slug) }}">Edit</option>
                  <option data-type="0" data-action="delete" data-url="{{ route('dashboard.employee.destroy', $data->slug) }}">Delete</option>
                </select>
              </td>

            </tr>

            @endforeach
        </table>
      </div>

      @if($employees->isEmpty())
        <div style="padding :5px;">
          <center><h4>No Records found!</h4></center>
        </div>
      @endif

      <div class="box-footer">
        {!! __html::table_counter($employees) !!}
        {!! $employees->appends($appended_requests)->render('vendor.pagination.bootstrap-4') !!}
      </div>

    </div>

  </section>

  <form id="dv_confirm_check_form" method="POST" style="display: none;">
    @csrf
  </form>

@endsection





@section('modals')

  {!! __html::modal_delete('emp_delete') !!}

@endsection 





@section('scripts')

  <script type="text/javascript">

    {!! __js::modal_confirm_delete_caller('emp_delete') !!}

    @if(Session::has('EMPLOYEE_UPDATE_SUCCESS'))
      {!! __js::toast(Session::get('EMPLOYEE_UPDATE_SUCCESS')) !!}
    @endif

    @if(Session::has('EMPLOYEE_DELETE_SUCCESS'))
      {!! __js::toast(Session::get('EMPLOYEE_DELETE_SUCCESS')) !!}
    @endif

  </script>
    
@endsection