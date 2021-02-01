@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Create Department</h1>
  </section>

  <section class="content">

    <div class="box">
    
      <div class="box-header with-border">
        <h3 class="box-title">Form</h3>
        <div class="pull-right">
            <code>Fields with asterisks(*) are required</code>
        </div> 
      </div>
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.department.store') }}">

        <div class="box-body">
     
          @csrf    

          {!! __form::textbox(
             '4', 'name', 'text', 'Name *', 'Name', old('name'), $errors->has('name'), $errors->first('name'), ''
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

  @if(Session::has('DEPARTMENT_CREATE_SUCCESS'))

    {!! __html::modal(
      'department_create', '<i class="fa fa-fw fa-check"></i> Saved!', Session::get('DEPARTMENT_CREATE_SUCCESS')
    ) !!}
    
  @endif

@endsection 




@section('scripts')

  <script type="text/javascript">

    @if(Session::has('DEPARTMENT_CREATE_SUCCESS'))
      $('#department_create').modal('show');
    @endif

  </script> 
    
@endsection