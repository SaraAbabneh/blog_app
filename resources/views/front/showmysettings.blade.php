@extends('layouts.front')

@section('title')

    My Settings
@endsection

@section('contentheader')
My Info
@endsection

@section('contentheaderlink')

<a href="{{route('front.dashboard')}}">Home </a>
@endsection


@section('contentheaderactive')
    My Info
@endsection



@section('contentheader')

@endsection


@section('content')


<div class="card mb-5" style="width: 400px;">
    <img class="card-img-top" 
    src="{{ auth()->user()->userSetting->photo !== null ? asset('storage/app/public/' . auth()->user()->userSetting->photo) : asset('assets/admin/dist/img/user2-160x160.jpg') }}"
    alt="Card image" 
         style="width: 80%;">
    <div class="card-body">
        <p class="card-title font-weight-bold">{{ auth()->user()->name }}</p>

        <div class="mt-5 mb-3">
            <p class="card-text font-weight-bold">Phone</p>
            <p class="card-text">{{ auth()->user()->userSetting->phone ?: 'Add your phone' }}</p>
            
            <p class="card-text font-weight-bold">Email</p>
            <p class="card-text">{{ auth()->user()->email ?: 'Add your email' }}</p>
            
            <p class="card-text font-weight-bold">Address</p>
            <p class="card-text">{{ auth()->user()->userSetting->address ?: 'Add your address' }}</p>
            
            <p class="card-text font-weight-bold">Gender</p>
            <p class="card-text">{{ auth()->user()->userSetting->gender ?: 'Select your gender' }}</p>
        </div>
        
        <div >
            <a href="{{ route('front.addInfo') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>


@endsection

