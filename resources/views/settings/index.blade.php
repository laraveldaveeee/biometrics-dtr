@extends('layouts.master') 
@section('content') 

  <!-- PAGE HEADER -->

   <div class="main">
      <header class="topbar">
        <div>
          <div class="page-title"> <i class="bi bi-gear-fill text-primary"></i> System Settings </div>
          <div class="page-subtitle">Configure Office Information and Report Signatories</div>
        </div>
        <div class="fw-bold"> Administrator </div>
      </header>
      <div class="container-fluid">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <div> 
      <p class="text-secondary mb-0">  </p>
    </div>
  </div> @if(session('success')) 
  <div class="alert alert-success">
    <i class="bi bi-check-circle-fill"></i>
    {{ session('success') }}
  </div> @endif <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data"> @csrf
    <!-- OFFICE INFORMATION -->
    <div class="card border-0 shadow rounded-4 mb-4">
      <div class="card-header bg-white">
        <h5 class="fw-bold mb-0">
          <i class="bi bi-building"></i> Office Information
        </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label"> Office Name </label>
            <input type="text" name="office_name" class="form-control" value="{{ old('office_name',$setting->office_name) }}">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label"> Office Address </label>
            <input type="text" name="office_address" class="form-control" value="{{ old('office_address',$setting->office_address) }}">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label"> Office Logo </label>
          <input type="file" name="office_logo" class="form-control">
        </div> @if($setting->office_logo) <img src="{{ asset('storage/'.$setting->office_logo) }}" width="120" class="img-thumbnail"> @endif
      </div>
    </div>
    <!-- PREPARED BY -->
    <div class="card border-0 shadow rounded-4 mb-4">
      <div class="card-header bg-white">
        <h5 class="fw-bold mb-0"> Prepared By </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <label>Name</label>
            <input type="text" name="prepared_by" class="form-control" value="{{ old('prepared_by',$setting->prepared_by) }}">
          </div>
          <div class="col-md-6">
            <label>Position</label>
            <input type="text" name="prepared_position" class="form-control" value="{{ old('prepared_position',$setting->prepared_position) }}">
          </div>
        </div>
      </div>
    </div>
    <!-- CHECKED BY -->
    <div class="card border-0 shadow rounded-4 mb-4">
      <div class="card-header bg-white">
        <h5 class="fw-bold mb-0"> Checked By </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <label>Name</label>
            <input type="text" name="checked_by" class="form-control" value="{{ old('checked_by',$setting->checked_by) }}">
          </div>
          <div class="col-md-6">
            <label>Position</label>
            <input type="text" name="checked_position" class="form-control" value="{{ old('checked_position',$setting->checked_position) }}">
          </div>
        </div>
      </div>
    </div>
    <!-- APPROVED BY -->
    <div class="card border-0 shadow rounded-4 mb-4">
      <div class="card-header bg-white">
        <h5 class="fw-bold mb-0"> Approved By </h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <label>Name</label>
            <input type="text" name="approved_by" class="form-control" value="{{ old('approved_by',$setting->approved_by) }}">
          </div>
          <div class="col-md-6">
            <label>Position</label>
            <input type="text" name="approved_position" class="form-control" value="{{ old('approved_position',$setting->approved_position) }}">
          </div>
        </div>
      </div>
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-primary px-5">
        <i class="bi bi-save-fill"></i> Save Settings </button>
    </div>
  </form>
</div> 
</div> 
<br>
@endsection