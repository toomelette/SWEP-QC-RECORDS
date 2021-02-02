@extends('layouts.admin-master')

@section('content')
    
  <section class="content-header">
      <h1>Edit Contact</h1>
      <div class="pull-right" style="margin-top: -25px;">
        {!! __html::back_button(['dashboard.email_contact.index']) !!}
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
      
      <form role="form" method="POST" autocomplete="off" action="{{ route('dashboard.email_contact.update', $email_contact->slug) }}">

        <div class="box-body">
          
          <input name="_method" value="PUT" type="hidden">
          
          @csrf    

          {!! __form::textbox(
             '6', 'name', 'text', 'Name / Description *', 'Name / Description', old('name') ? old('name') : $email_contact->name, $errors->has('name'), $errors->first('name'), ''
          ) !!} 

          {!! __form::textbox(
            '6', 'category', 'text', 'Category', 'Category', old('category') ? old('category') : $email_contact->category, $errors->has('category'), $errors->first('category'), ''
          ) !!} 

          <div class="col-md-12"></div>

          {!! __form::textbox(
             '6', 'email', 'text', 'Email *', 'Email', old('email') ? old('email') : $email_contact->email, $errors->has('email'), $errors->first('email'), ''
          ) !!} 

          {!! __form::textbox(
             '6', 'contact_no', 'text', 'Contact No.', 'Contact No.', old('contact_no') ? old('contact_no') : $email_contact->contact_no, $errors->has('contact_no'), $errors->first('contact_no'), ''
          ) !!} 

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-default">Save <i class="fa fa-fw fa-save"></i></button>
        </div>

      </form>

    </div>

  </section>

@endsection
