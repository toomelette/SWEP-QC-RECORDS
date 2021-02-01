@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Create Applicant</h1>
  </section>

  <section class="content">

    <div class="box">
    
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.applicant.store') }}">

        <div class="box-body">
     
          @csrf    

          {!! __form::textbox(
            '3', 'lastname', 'text', 'Lastname *', 'Lastname', old('lastname'), $errors->has('lastname'), $errors->first('lastname'), 'data-transform="uppercase"'
          ) !!}   

          {!! __form::textbox(
            '3', 'firstname', 'text', 'Firstname *', 'Firstname', old('firstname'), $errors->has('firstname'), $errors->first('firstname'), 'data-transform="uppercase"'
          ) !!}  

          {!! __form::textbox(
            '3', 'middlename', 'text', 'Middlename *', 'Middlename', old('middlename'), $errors->has('middlename'), $errors->first('middlename'), 'data-transform="uppercase"'
          ) !!}

          {!! __form::select_static(
            '3', 'gender', 'Gender *', old('gender'), ['Male' => 'MALE', 'Female' => 'FEMALE'], $errors->has('gender'), $errors->first('gender'), '', ''
          ) !!}

          <div class="col-md-12"></div>

          {!! __form::datepicker(
            '3', 'date_of_birth',  'Date of Birth *', old('date_of_birth'), $errors->has('date_of_birth'), $errors->first('date_of_birth')
          ) !!}
                        
          {!! __form::select_static(
            '3', 'civil_status', 'Civil Status *', old('civil_status'), __static::civil_status(), $errors->has('civil_status'), $errors->first('civil_status'), '', ''
          ) !!}

          {!! __form::textbox(
            '6', 'address', 'text', 'Address *', 'Address', old('address'), $errors->has('address'), $errors->first('address'), ''
          ) !!}

          <div class="col-md-12"></div>

          {!! __form::select_dynamic(
            '3', 'course_id', 'Course *', old('course_id'), $global_courses_all, 'course_id', 'name', $errors->has('course_id'), $errors->first('course_id'), 'select2', ''
          ) !!}

          {!! __form::textbox(
            '3', 'school', 'text', 'School', 'School where you graduated your Degree', old('school'), $errors->has('school'), $errors->first('school'), ''
          ) !!}

          {!! __form::select_dynamic(
            '3', 'plantilla_id', 'Position Applied for', old('plantilla_id'), $global_plantilla_all, 'plantilla_id', 'name', $errors->has('plantilla_id'), $errors->first('plantilla_id'), 'select2', ''
          ) !!}

          {!! __form::textbox(
            '3', 'contact_no', 'text', 'Contact No.', 'Contact No.', old('contact_no'), $errors->has('contact_no'), $errors->first('contact_no'), ''
          ) !!}

          <div class="col-md-12"></div>

          {!! __form::select_dynamic(
            '3', 'department_unit_id', 'Unit Applied *', old('department_unit_id'), $global_department_units_all, 'department_unit_id', 'description', $errors->has('department_unit_id'), $errors->first('department_unit_id'), 'select2', ''
          ) !!}

          {!! __form::datepicker(
            '3', 'received_at',  'Date Received *', old('received_at'), $errors->has('received_at'), $errors->first('received_at')
          ) !!}

          {!! __form::textbox(
            '3', 'remarks', 'text', 'Remarks', 'Remarks', old('remarks'), $errors->has('remarks'), $errors->first('remarks'), ''
          ) !!}



          <div class="col-md-12" style="margin-top:50px;"></div>

          {{-- EDC Background --}}
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Educational Background</h3>
                <button id="edc_background_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
              </div>
              
              <div class="box-body no-padding">

                <table class="table table-bordered">

                  <tr>
                    <th>Course *</th>
                    <th>School *</th>
                    <th>Units</th>
                    <th>Graduate Year *</th>
                    <th style="width: 40px"></th>
                  </tr>

                  <tbody id="edc_background_table_body">

                    @if(old('row_edc_background'))

                      @foreach(old('row_edc_background') as $key => $value)

                        <tr>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_edc_background['. $key .'][course]', 'Course *', $value['course'], $errors->first('row_edc_background.'. $key .'.course')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_edc_background['. $key .'][school]', 'School *', $value['school'], $errors->first('row_edc_background.'. $key .'.school')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_edc_background['. $key .'][units]', 'Units', $value['units'], $errors->first('row_edc_background.'. $key .'.units')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_edc_background['. $key .'][graduate_year]', 'Graduate Year *', $value['graduate_year'], $errors->first('row_edc_background.'. $key .'.graduate_year')
                            ) !!}
                          </td>

                          <td>
                              <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                          </td>

                        </tr>

                      @endforeach

                    @endif

                    </tbody>

                </table>

              </div>
            </div>
          </div>





          <div class="col-md-12" style="margin-top:50px;"></div>

          {{-- Trainings --}}
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Trainings / Seminars</h3>
                <button id="trainings_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
              </div>
              
              <div class="box-body no-padding">

                <table class="table table-bordered">

                  <tr>
                    <th>Title *</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Venue</th>
                    <th>Conducted By</th>
                    <th>Remarks</th>
                    <th style="width: 40px"></th>
                  </tr>

                  <tbody id="trainings_table_body">

                    @if(old('row_training'))

                      @foreach(old('row_training') as $key => $value)

                        <tr>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_training['. $key .'][title]', 'Title *', $value['title'], $errors->first('row_training.'. $key .'.title')
                            ) !!}
                          </td>

                          <td> 
                            {!! __form::datepicker_for_dt(
                              'row_training['. $key .'][date_from]', $value['date_from'], $errors->first('row_training.'. $key .'.date_from')
                            ) !!}
                          </td>

                          <td> 
                            {!! __form::datepicker_for_dt(
                              'row_training['. $key .'][date_to]', $value['date_to'], $errors->first('row_training.'. $key .'.date_to')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_training['. $key .'][venue]', 'Venue', $value['venue'], $errors->first('row_training.'. $key .'.venue')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_training['. $key .'][conducted_by]', 'Conducted By', $value['conducted_by'], $errors->first('row_training.'. $key .'.conducted_by')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_training['. $key .'][remarks]', 'Remarks', $value['remarks'], $errors->first('row_training.'. $key .'.remarks')
                            ) !!}
                          </td>

                          <td>
                              <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                          </td>

                        </tr>

                      @endforeach

                    @endif

                    </tbody>

                </table>

              </div>
            </div>
          </div>





          <div class="col-md-12" style="margin-top:50px;"></div>

          {{-- Experiences --}}
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Work Experiences</h3>
                <button id="exp_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
              </div>
              
              <div class="box-body no-padding">

                <table class="table table-bordered">

                  <tr>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Position</th>
                    <th>Company *</th>
                    <th>Gov Service (Y/N) *</th>
                    <th style="width: 40px"></th>
                  </tr>

                  <tbody id="exp_table_body">

                    @if(old('row_exp'))

                      @foreach(old('row_exp') as $key => $value)

                        <tr>

                          <td> 
                            {!! __form::datepicker_for_dt(
                              'row_exp['. $key .'][date_from]', $value['date_from'], $errors->first('row_exp.'. $key .'.date_from')
                            ) !!}
                          </td>

                          <td> 
                            {!! __form::datepicker_for_dt(
                              'row_exp['. $key .'][date_to]', $value['date_to'], $errors->first('row_exp.'. $key .'.date_to')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_exp['. $key .'][position]', 'Position', $value['position'], $errors->first('row_exp.'. $key .'.position')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_exp['. $key .'][company]', 'Company *', $value['company'], $errors->first('row_exp.'. $key .'.company')
                            ) !!}
                          </td>


                          <td>
                            {!! __form::select_static_for_dt(
                              'row_exp['. $key .'][is_gov_service]', ['YES' => 'true', 'NO' => 'false'], $value['is_gov_service'], $errors->first('row_exp.'. $key .'.is_gov_service')
                            ) !!}
                          </td>

                          <td>
                              <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                          </td>

                        </tr>

                      @endforeach

                    @endif

                    </tbody>

                </table>

              </div>
            </div>
          </div>





          <div class="col-md-12" style="margin-top:50px;"></div>

          {{-- Eligibility --}}
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Eligibilities</h3>
                <button id="elig_add_row" type="button" class="btn btn-sm bg-green pull-right">Add Row &nbsp;<i class="fa fw fa-plus"></i></button>
              </div>
              
              <div class="box-body no-padding">

                <table class="table table-bordered">

                  <tr>
                    <th>Eligibility *</th>
                    <th>Level</th>
                    <th>Rating *</th>
                    <th>Exam Date</th>
                    <th>Exam Place</th>
                    <th style="width: 40px"></th>
                  </tr>

                  <tbody id="elig_table_body">

                    @if(old('row_elig'))

                      @foreach(old('row_elig') as $key => $value)

                        <tr>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_elig['. $key .'][eligibility]', 'Eligibility', $value['eligibility'], $errors->first('row_elig.'. $key .'.eligibility')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_elig['. $key .'][level]', 'Level', $value['level'], $errors->first('row_elig.'. $key .'.level')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_elig['. $key .'][rating]', 'Rating', $value['rating'], $errors->first('row_elig.'. $key .'.rating')
                            ) !!}
                          </td>

                          <td>
                            {!! __form::textbox_for_dt(
                              'row_elig['. $key .'][exam_place]', 'Exam Place', $value['exam_place'], $errors->first('row_elig.'. $key .'.exam_place')
                            ) !!}
                          </td>

                          <td> 
                            {!! __form::datepicker_for_dt(
                              'row_elig['. $key .'][exam_date]', $value['exam_date'], $errors->first('row_elig.'. $key .'.exam_date')
                            ) !!}
                          </td>

                          <td>
                              <button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>
                          </td>

                        </tr>

                      @endforeach

                    @endif

                    </tbody>

                </table>

              </div>
            </div>
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

  @if(Session::has('APPLICANT_CREATE_SUCCESS'))

    {!! __html::modal(
      'applicant_create', '<i class="fa fa-fw fa-check"></i> Saved!', Session::get('APPLICANT_CREATE_SUCCESS')
    ) !!}
    
  @endif

@endsection 




@section('scripts')

  <script type="text/javascript">


    @if(Session::has('APPLICANT_CREATE_SUCCESS'))
      $('#applicant_create').modal('show');
    @endif


    {{-- EDC Background ADD ROW --}}
    $(document).ready(function() {

      $("#edc_background_add_row").on("click", function() {
      var i = $("#edc_background_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_edc_background[' + i + '][course]" class="form-control" placeholder="Course">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_edc_background[' + i + '][school]" class="form-control" placeholder="School">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_edc_background[' + i + '][units]" class="form-control" placeholder="Units">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_edc_background[' + i + '][graduate_year]" class="form-control" placeholder="Graduate Year">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#edc_background_table_body").append($(content));

      });

    });




    {{-- Trainings ADD ROW --}}
    $(document).ready(function() {

      $("#trainings_add_row").on("click", function() {
      var i = $("#trainings_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][title]" class="form-control" placeholder="Title">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_training[' + i + '][date_from]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_training[' + i + '][date_to]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][venue]" class="form-control" placeholder="Venue">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][conducted_by]" class="form-control" placeholder="Conducted By">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_training[' + i + '][remarks]" class="form-control" placeholder="Remarks">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#trainings_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });
      
      $(this).removeClass('datepicker');

      });

    });




    {{-- Experience ADD ROW --}}
    $(document).ready(function() {

      $("#exp_add_row").on("click", function() {
      var i = $("#exp_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_exp[' + i + '][date_from]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_exp[' + i + '][date_to]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_exp[' + i + '][position]" class="form-control" placeholder="Position">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_exp[' + i + '][company]" class="form-control" placeholder="Company">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<select name="row_exp[' + i + '][is_gov_service]" class="form-control">' +
                            '<option value="">Select</option>' +
                              '<option value="true">YES</option>' +
                              '<option value="false">NO</option>' +
                          '</select>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#exp_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });
      
      $(this).removeClass('datepicker');

      });

    });




    {{-- Eligibility ADD ROW --}}
    $(document).ready(function() {

      $("#elig_add_row").on("click", function() {
      var i = $("#elig_table_body").children().length;
      var content ='<tr>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_elig[' + i + '][eligibility]" class="form-control" placeholder="Eligibility">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_elig[' + i + '][level]" class="form-control" placeholder="Level">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_elig[' + i + '][rating]" class="form-control" placeholder="Rating">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<div class="input-group">' +
                            '<div class="input-group-addon">' +
                              '<i class="fa fa-calendar"></i>' +
                            '</div>' +
                            '<input name="row_elig[' + i + '][exam_date]" type="text" class="form-control datepicker" placeholder="mm/dd/yy">' +
                          '</div>' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                        '<div class="form-group">' +
                          '<input type="text" name="row_elig[' + i + '][exam_place]" class="form-control" placeholder="Exam Place">' +
                        '</div>' +
                      '</td>' +

                      '<td>' +
                          '<button id="delete_row" type="button" class="btn btn-sm bg-red"><i class="fa fa-times"></i></button>' +
                      '</td>' +

                    '</tr>';

      $("#elig_table_body").append($(content));

      $('.datepicker').each(function(){
          $(this).datepicker({
            autoclose: true,
            dateFormat: "mm/dd/yy",
            orientation: "bottom"
        });
      });
      
      $(this).removeClass('datepicker');

      });

    });




  </script> 
    
@endsection