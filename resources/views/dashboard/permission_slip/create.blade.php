@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Create Permission</h1>
  </section>

  <section class="content">

    <div class="box">
    
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.permission_slip.store') }}" enctype="multipart/form-data">

        <div class="box-body">
     
          @csrf 

          {!! __form::datepicker(
            '3', 'date',  'Date *', old('date') ? old('date') : Carbon::now()->format('m/d/Y'), $errors->has('date'), $errors->first('date')
          ) !!}

          {!! __form::select_dynamic(
            '3', 'employee_no', 'Employee *', old('employee_no'), $global_employees_all, 'employee_no', 'fullname', $errors->has('employee_no'), $errors->first('employee_no'), 'select2', ''
          ) !!}

          {!! __form::timepicker(
            '3', 'time_out',  'Time Out *', old('time_out'), $errors->has('time_out'), $errors->first('time_out')
          ) !!}

          {!! __form::timepicker(
            '3', 'time_in',  'Time In *', old('time_in'), $errors->has('time_in'), $errors->first('time_in')
          ) !!}

          <div class="col-md-12"></div>

          {!! __form::select_static(
            '3', 'with_ps', 'With PS *', old('with_ps'), ['Yes' => 'true', 'No' => 'false'], $errors->has('with_ps'), $errors->first('with_ps'), '', ''
          ) !!}



        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-default">Save <i class="fa fa-fw fa-save"></i></button>
        </div>

      </form>

    </div>

  </section>

@endsection





@section('modals')

  @if(Session::has('PS_CREATE_SUCCESS'))

    {!! __html::modal(
      'ps_create', '<i class="fa fa-fw fa-check"></i> Saved!', Session::get('PS_CREATE_SUCCESS')
    ) !!}
    
  @endif

@endsection 





@section('scripts')

  <script type="text/javascript">

    @if(Session::has('PS_CREATE_SUCCESS'))
      $('#ps_create').modal('show');
    @endif

  </script> 
    
@endsection