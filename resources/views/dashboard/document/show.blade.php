@extends('layouts.admin-master')

@section('content')

<section class="content-header">
    <h1>Document Details</h1>
    <div class="pull-right" style="margin-top: -25px;">
      {!! __html::back_button(['dashboard.document.index']) !!}
    </div>
</section>

<section class="content">

    <div class="box">
        
      <div class="box-header with-border">
        
        <h3 class="box-title">Details</h3>

        <div class="box-tools">
          <a href="{{ route('dashboard.document.edit', $document->slug) }}" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
        </div>

      </div>
      
      <div class="box-body">


        {{-- DOC Info --}}
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Document Info</h3>
            </div>
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Reference No:</dt>
                <dd>{{ $document->reference_no }}</dd>
                <dt>Date:</dt>
                <dd>{{ __dataType::date_parse($document->date, 'm/d/Y') }}</dd>
                <dt>To:</dt>
                <dd>{{ $document->person_to }}</dd>
                <dt>From:</dt>
                <dd>{{ $document->person_from }}</dd>
                <dt>Subject:</dt>
                <dd>{{ $document->subject }}</dd>
                <dt>Reference No:</dt>
                <dd>{{ $document->reference_no }}</dd>
                <dt>Folder Code:</dt>
                <dd>
                  {{ $document->folder_code }}, {{ !empty($document->folder_code2) ? $document->folder_code2 : '' }}

                </dd>
                <dt>Remarks:</dt>
                <dd>{{ $document->remarks }}</dd>
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
                <dd>{{ __dataType::date_parse($document->created_at, 'M d, Y h:i A') }}</dd>
                <dt>IP Created:</dt>
                <dd>{{ $document->ip_created }}</dd>
                <dt>User Created:</dt>
                <dd>{{ $document->user_created }}</dd>
                <dt>Date Updated:</dt>
                <dd>{{ __dataType::date_parse($document->updated_at, 'M d, Y h:i A') }}</dd>
                <dt>IP Updated:</dt>
                <dd>{{ $document->ip_updated }}</dd>
                <dt>User Updated:</dt>
                <dd>{{ $document->user_updated }}</dd>
              </dl>

            </div>
          </div>
        </div> 






    </div>
  </div>

</section>

@endsection

