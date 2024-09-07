@extends('layouts.front')
@section('title')

    Admin UserSettings
@endsection

@section('contentheader')
    Admin UserSettings
@endsection

@section('contentheaderlink')

<a href="{{route('front.dashboard')}}">Home </a>
@endsection


@section('contentheaderactive')
    Settings
@endsection



@section('contentheader')

@endsection


@section('content')
    <div class="d-flex justify-content-start col-md-8 ml-2 mb-1">
        <a class="fas fa-arrow-left fa-sm" href="{{ route('front.showalluser')}}"> back</a>
    </div>
@if (isset($user->userSetting) && $user->userSetting->phone !== null)
<div class="card mb-5" style="width: 400px;">
    <img class="card-img-top ml-5 mt-5" 
    src="{{$user->userSetting->photo ? asset('storage/app/public/' .$user->userSetting->photo) : asset('assets/admin/dist/img/user2-160x160.jpg') }}"
    alt="Card image" 
         style="width: 80%;">
    <div class="card-body">
        <p class="card-title font-weight-bold">{{$user->name }}</p>

        <div class="mt-5 mb-3">
            <p class="card-text font-weight-bold">Phone</p>
            <p class="card-text">{{$user->userSetting->phone ?: 'Add your phone' }}</p>
            
            <p class="card-text font-weight-bold">Email</p>
            <p class="card-text">{{$user->email ?: 'Add your email' }}</p>
            
            <p class="card-text font-weight-bold">Address</p>
            <p class="card-text">{{$user->userSetting->address ?: 'Add your address' }}</p>
            
            <p class="card-text font-weight-bold">Gender</p>
            <p class="card-text">{{$user->userSetting->gender ?: 'Select your gender' }}</p>
        </div>
        
        <div >
            <a href="{{ route('front.adduserInfo', $user->id) }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@else
<p> no more data insert </p>

@endif

@endsection

