@extends('layouts.admin')

@section('title')

    Admin Settings
@endsection

@section('contentheader')
    Admin Settings
@endsection

@section('contentheaderlink')

<a href="{{route('admin.dashboard')}}">Home </a>
@endsection


@section('contentheaderactive')
    Settings
@endsection



@section('contentheader')

@endsection


@section('content')

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary" >
      <div class="card-header">
        <h3 class="card-title">Add info</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" method="POST" action="{{ route('admin.submituserinfo') }}" enctype="multipart/form-data">
        @csrf 
        <input name="user_id" value="{{$user->id}}" hidden>
        
        
        <div class="card-body">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required
                value="{{ old('phone',  $user->userSetting->phone ?? '') }}"
                >
                
        
                @error('phone')
                    <span class="text-danger mb-3">{{$message}} </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" 
                value="{{ old('address',  $user->userSetting->address ?? '') }}"
                >
                @error('address')
                    <span class="text-danger mb-3">{{$message}} </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label>Gender</label>
                <div class="d-flex align-items-center">
                    <div class="custom-control custom-radio mr-3">
                        <input class="custom-control-input" type="radio" id="male" name="gender" value="male" 
                        {{ old('gender',  $user->userSetting->gender ?? '') === 'male' ? 'checked' : '' }}
                        required >
                        <label for="male" class="custom-control-label">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="female" name="gender" value="female" required {{ old('gender',  $user->userSetting->gender ?? '') === 'female' ? 'checked' : '' }}
                        required
                    >
                        <label for="female" class="custom-control-label">Female</label>
                    </div>
                </div>
                
                @error('gender')
                    <span class="text-danger mb-3">{{$message}} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <br>
            
                @if ( $user->userSetting->photo)
                    <img 
                    src="{{ asset('storage/app/public/' .  $user->userSetting->photo) }}"  
                        alt="User Photo" 
                        style="width: 50%;">
                @endif
            
                <div class="input-group mt-2">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('photo')
                <span class="text-danger mb-3">{{$message}} </span>
            @enderror
            </div>
            
            
            </div>
           
    
           
        </div>
    
        <div class="card-footer">
            <a href="{{route('admin.showuserinfo', $user->id) }}"  class="btn btn-primary">cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    
    </div>

@endsection

