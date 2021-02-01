@extends('layouts.admin-master')

@section('content')

<section class="content-header">
    <h1>PS Details</h1>
    <div class="pull-right" style="margin-top: -25px;">
      {!! __html::back_button(['dashboard.permission_slip.index',]) !!}
    </div>
</section>

<section class="content">

    <div class="box">
        
      <div class="box-header with-border">
        
        <h3 class="box-title">Details</h3>

        <div class="box-tools">
          <a href="{{ route('dashboard.permission_slip.edit', $permission_slip->slug) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
        </div>

      </div>
      
      <div class="box-body">


        {{-- DOC Info --}}
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">PS Info</h3>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Control No:</dt>
                <dd>{{ $permission_slip->ps_id }}</dd>
                <dt>Employee:</dt>
                <dd>{{ $permission_slip->employee->fullname }}</dd>
                <dt>Date:</dt>
                <dd>{{ __dataType::date_parse($permission_slip->date, 'm/d/Y') }}</dd>
                <dt>Time Out:</dt>
                <dd>{{ __dataType::time_parse($permission_slip->time_out, 'h:i A') }}</dd>
                <dt>Time In:</dt>
                <dd>{{ __dataType::time_parse($permission_slip->time_in, 'h:i A') }}</dd>
                <dt>With PS:</dt>
                <dd>{{ $permission_slip->with_ps == 1 ? 'YES' : 'NO'  }}</dd>
              </dl>
            </div>
          </div>
        </div>





        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User Modifications</h3>
            </div>
            <div class="box-body">

              <dl class="dl-horizontal col-sm-12">
                <dt>Date Created:</dt>
                <dd>{{ __dataType::date_parse($permission_slip->created_at, 'M d, Y h:i A') }}</dd>
                <dt>IP Created:</dt>
                <dd>{{ $permission_slip->ip_created }}</dd>
                <dt>User Created:</dt>
                <dd>{{ $permission_slip->user_created }}</dd>
                <dt>Date Updated:</dt>
                <dd>{{ __dataType::date_parse($permission_slip->updated_at, 'M d, Y h:i A') }}</dd>
                <dt>IP Updated:</dt>
                <dd>{{ $permission_slip->ip_updated }}</dd>
                <dt>User Updated:</dt>
                <dd>{{ $permission_slip->user_updated }}</dd>
              </dl>

            </div>
          </div>
        </div> 





    </div>
  </div>

</section>

@endsection

