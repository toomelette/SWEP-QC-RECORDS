@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Create Leave Application</h1>
  </section>

  <section class="content">

    <div class="box">
    
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.leave_application.store') }}">

        <div class="box-body">
     
          @csrf    

          {!! __form::textbox(
             '4', 'lastname', 'text', 'Lastname *', 'Lastname', old('lastname') ? old('lastname') : optional(Auth::user()->employee)->lastname, $errors->has('lastname'), $errors->first('lastname'), 'data-transform="uppercase"'
          ) !!}

          {!! __form::textbox(
             '4', 'firstname', 'text', 'Firstname *', 'Firstname', old('firstname') ? old('firstname') : optional(Auth::user()->employee)->firstname, $errors->has('firstname'), $errors->first('firstname'), 'data-transform="uppercase"'
          ) !!}

          {!! __form::textbox(
             '4', 'middlename', 'text', 'Middlename *', 'Middlename', old('middlename') ? old('middlename') : optional(Auth::user()->employee)->middlename, $errors->has('middlename'), $errors->first('middlename'), 'data-transform="uppercase"'
          ) !!} 

          <div class="col-md-12"></div>

          {!! __form::datepicker(
            '4', 'date_of_filing',  'Date of Filing *', old('date_of_filing') ? old('date_of_filing') : Carbon::now()->format('m/d/Y'), $errors->has('date_of_filing'), $errors->first('date_of_filing')
          ) !!}
          
          {!! __form::textbox(
             '4', 'position', 'text', 'Position *', 'Position', old('position') ? old('position') : optional(Auth::user()->employee)->position, $errors->has('position'), $errors->first('position'), 'data-transform="uppercase"'
          ) !!} 

          {!! __form::textbox_numeric(
            '4', 'salary', 'text', 'Salary (Monthly) *', 'Salary', old('salary') ? old('salary') : optional(Auth::user()->employee)->monthly_basic , $errors->has('salary'), $errors->first('salary'), ''
          ) !!}
          
          <div class="col-md-12"></div>

          {!! __form::textbox(
             '4', 'immediate_superior', 'text', 'Recommended by (Immediate Superior)', 'Immediate Superior', old('immediate_superior'), $errors->has('immediate_superior'), $errors->first('immediate_superior'), 'data-transform="uppercase"'
          ) !!}

          {!! __form::textbox(
             '4', 'immediate_superior_position', 'text', 'Immediate Superior Position', 'Immediate Superior Position', old('immediate_superior_position'), $errors->has('immediate_superior_position'), $errors->first('immediate_superior_position'), 'data-transform="uppercase"'
          ) !!}

          {{-- TYPE OF LEAVE --}} 
          <div class="col-md-12" style="margin-bottom:20px;">
              
            <h4>TYPE OF LEAVE:</h4>

            {!! __form::select_static(
              '3', 'type', 'Leave Type *', old('type'), __static::leave_types(), $errors->has('type'), $errors->first('type'), '', ''
            ) !!}
          
            <div class="col-md-9" id="type_vacation_div">
                
              {!! __form::select_static(
                '3', 'type_vacation', 'Vacation Type *', old('type_vacation'), __static::vacation_types(), $errors->has('type_vacation'), $errors->first('type_vacation'), '', ''
              ) !!}
                
              {!! __form::textbox(
                 '9', 'type_vacation_others_specific', 'text', 'If (others) specify', 'Specify', old('type_vacation_others_specific'), $errors->has('type_vacation_others_specific'), $errors->first('type_vacation_others_specific'), ''
              ) !!} 

            </div>

            <div class="col-md-9" id="type_others_div">

              {!! __form::textbox(
                 '12', 'type_others_specific', 'text', 'If (others) specify *', 'Specify', old('type_others_specific'), $errors->has('type_others_specific'), $errors->first('type_others_specific'), ''
              ) !!} 
              
            </div>  

          </div>



          {{-- WHERE LEAVE WILL BE SPENT --}} 
          <div class="col-md-12" style="margin-bottom:20px;">
              
            <h4>WHERE LEAVE WILL BE SPENT:</h4>


            <div class="col-md-12">
              
              {!! __form::select_static(
                '3', 'spent_vacation', 'In case of Vacation Leave', old('spent_vacation'), __static::spent_vacation(), $errors->has('spent_vacation'), $errors->first('spent_vacation'), '', ''
              ) !!}

              <div class="col-md-9" id="spent_vacation_abroad_div">
                  
                {!! __form::textbox(
                   '12', 'spent_vacation_abroad_specific', 'text', 'If (Abroad) specify', 'Specify', old('spent_vacation_abroad_specific'), $errors->has('spent_vacation_abroad_specific'), $errors->first('spent_vacation_abroad_specific'), ''
                ) !!}

              </div>

            </div>


            <div class="col-md-12">
              
              {!! __form::select_static(
                '3', 'spent_sick', 'In case of Sick Leave', old('spent_sick'), __static::spent_sick(), $errors->has('spent_sick'), $errors->first('spent_sick'), '', ''
              ) !!}

              <div class="col-md-9" id="spent_sick_inHospital_div">
                  
                {!! __form::textbox(
                   '12', 'spent_sick_inhospital_specific', 'text', 'If (In Hospital) specify *', 'Specify', old('spent_sick_inhospital_specific'), $errors->has('spent_sick_inhospital_specific'), $errors->first('spent_sick_inhospital_specific'), ''
                ) !!}

              </div>

              <div class="col-md-9" id="spent_sick_outPatient_div">
                  
                {!! __form::textbox(
                   '12', 'spent_sick_outpatient_specific', 'text', 'If (Out Patient) specify *', 'Specify', old('spent_sick_outpatient_specific'), $errors->has('spent_sick_outpatient_specific'), $errors->first('spent_sick_outpatient_specific'), ''
                ) !!}

              </div>

            </div>


          </div>



          {{-- NUMBER OF WORKING DAYS --}}
          <div class="col-md-12" style="margin-bottom:20px;">
              
            <h4>NUMBER OF WORKING DAYS APPLIED:</h4>  

            {!! __form::textbox(
               '4', 'working_days', 'text', 'Number of Days *', 'Number of Days', old('working_days'), $errors->has('working_days'), $errors->first('working_days'), ''
            ) !!}

            {!! __form::datepicker(
              '4', 'working_days_date_from',  'Date From', old('working_days_date_from'), $errors->has('working_days_date_from'), $errors->first('working_days_date_from')
            ) !!}

            {!! __form::datepicker(
              '4', 'working_days_date_to',  'Date To', old('working_days_date_to'), $errors->has('working_days_date_to'), $errors->first('working_days_date_to')
            ) !!}

          </div>



          {{-- COMMUTATION --}}
          <div class="col-md-12" style="margin-bottom:20px;">
              
            <h4>COMMUTATION:</h4>  

            {!! __form::select_static(
              '3', 'commutation', 'Commutation *', old('commutation'), __static::commutation_types(), $errors->has('commutation'), $errors->first('commutation'), '', ''
            ) !!}

          </div>



        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-default">Save <i class="fa fa-fw fa-save"></i></button>
        </div>

      </form>

    </div>

  </section>

@endsection





@section('modals')

  @if(Session::has('LA_CREATE_SUCCESS'))
   {!! __html::modal_print(
      'la_create', '<i class="fa fa-fw fa-check"></i> Saved!', Session::get('LA_CREATE_SUCCESS'), route('dashboard.leave_application.show', Session::get('LA_CREATE_SUCCESS_SLUG'))
    ) !!}
  @endif

@endsection 





@section('scripts')

  <script type="text/javascript">

    @if(Session::has('LA_CREATE_SUCCESS'))
      $('#la_create').modal('show');
    @endif
    

    @if($errors->has('type_vacation') || $errors->has('type_vacation_others_specific') || old('type_vacation') || old('type_vacation_others_specific'))
      $('#type_vacation_div').show();
      $('#type_others_div').hide();
    @elseif($errors->has('type_others_specific') || old('type_others_specific'))
      $('#type_others_div').show();
      $('#type_vacation_div').hide();
    @else
      $('#type_vacation_div').hide();
      $('#type_others_div').hide();
    @endif


    $(document).on("change", "#type", function () {
      $('#type_vacation').val('');
      $('#type_vacation_others_specific').val('');
      $('#type_others_specific').val('');
      $('#spent_vacation').val('');
      $('#spent_vacation_abroad_specific').val('');
      $('#spent_sick').val('');
      $('#spent_sick_inhospital_specific').val('');
      $('#spent_sick_outpatient_specific').val('');
      var val = $(this).val();
        if(val == "T1001"){ 
          $('#type_vacation_div').show();
          $('#type_others_div').hide();
        }else if(val == "T1004"){
          $('#type_others_div').show();
          $('#type_vacation_div').hide();
        }else{
          $('#type_vacation_div').hide();
          $('#type_others_div').hide();
        }
   });


  @if($errors->has('spent_sick_inhospital_specific') || old('spent_sick_inhospital_specific'))
    $('#spent_sick_inHospital_div').show();
    $('#spent_sick_outPatient_div').hide();
  @elseif($errors->has('spent_sick_outpatient_specific') || old('spent_sick_outpatient_specific'))
    $('#spent_sick_outPatient_div').show();
    $('#spent_sick_inHospital_div').hide();
  @else
    $('#spent_sick_inHospital_div').hide();
    $('#spent_sick_outPatient_div').hide();
  @endif


  $(document).on("change", "#spent_sick", function () {
    $('#spent_sick_inhospital_specific').val('');
    $('#spent_sick_outpatient_specific').val('');
    var val = $(this).val();
      if(val == "SS1001"){ 
        $('#spent_sick_inHospital_div').show();
        $('#spent_sick_outPatient_div').hide();
      }else if(val == "SS1002"){
        $('#spent_sick_outPatient_div').show();
        $('#spent_sick_inHospital_div').hide();
      }else{
        $('#spent_sick_outPatient_div').hide();
        $('#spent_sick_inHospital_div').hide();
      }
  });

  </script> 

@endsection