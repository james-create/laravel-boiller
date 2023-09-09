
@extends('layouts.admin')
@section('content')

<div class="content-wrapper" style="min-height: 2838.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
       
        For security kindly input old password then new password and confirm it to complete password change


          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">



{{-- 
          @if (session('status'))
          <div class="alert alert-danger">
            {{ session('status') }}
          </div>
          @endif --}}
    
          <form class="form-group" action="{{route('store_change_password')}}" method="post">
            @csrf
        <label >Old Password</label> <b style="color: red;">*</b>
        <input class="form-control @error('old_password') border border-danger @enderror"   name="old_password" value="" type="password">
        <span class="text-danger">@error('old_password'){{$message}}@enderror <br></span>
        <label >New Password</label> <b style="color: red;">*</b>
        <input class="form-control  @error('password') border border-danger @enderror " name="password" type="password" {{ old('password') }}>
        <span class="text-danger">@error('password'){{$message}}@enderror <br></span>
        <label >Confirm New Password</label> <b style="color: red;">*</b>
        <input class="form-control @error('password_confirmation') border border-danger @enderror"   name="password_confirmation" type="password" {{ old('password_confirmation') }}>
        <span class="text-danger">@error('password_confirmation'){{$message}}@enderror <br></span>
        <br>
        <button class="form-control btn btn-info" type="submit">SUBMIT</button>
        </form>
    

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <i></i>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  @endsection