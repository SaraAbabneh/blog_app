@extends('layouts.front')

@section('title')
    Admin Crude
@endsection

@section('css')
    <style>
        body {
            background-color: #eee;

        }

        .bdge {
            height: 21px;
            background-color: orange;
            color: #fff;
            font-size: 11px;
            padding: 8px;
            border-radius: 4px;
            line-height: 3px;
        }

        .comments {
            text-decoration: none;
            text-underline-position: under;
            cursor: pointer;
        }

        .dot {
            height: 7px;
            width: 7px;
            margin-top: 3px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .hit-voting:hover {
            color: blue;
        }

        .hit-voting {
            cursor: pointer;
        }
        .comment {
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .box-shadow {
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
        }
        .commented-user {
            position: relative; /* Establishes a positioning context for the child elements */
        }
        .post-user {
            position: relative; /* Establishes a positioning context for the child elements */
        }
        .action-texts {
    position: absolute; /* Allows precise positioning within the container */
    right: 0; /* Aligns the text to the right side */
    top: 0; /* Aligns the text to the top of the container */
    display: flex; /* Aligns the texts horizontally */
    gap: 10px; /* Space between "edit" and "remove" */
    direction: rtl; /* Sets text direction to RTL if needed */
    align-items: center;    }

    .edit-text, .remove-text
    {
    text-align: right; /* Ensures text alignment is right */
    /* Optional additional styling */
    font-size: 14px; /* Optional font size */
    color: #007bff; /* Optional text color */
    cursor: pointer; /* Changes cursor to pointer for clickable text */
    }
    .remove-text{
        color: red;
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
        margin: 0;
    }
    .edit-text{
        color: #007bff;
    }
   

    </style>
@endsection

@section('contentheader')
    Crude Post, comment and Reply
@endsection

@section('contentheaderlink')
    <a href="{{ route('admin.dashboard') }}">Home </a>
@endsection


@section('contentheaderactive')
    Crude
@endsection



@section('contentheader')
@endsection


@section('content')
<form action="{{ route('front.createPost')}}" method="POST">
<div class="d-flex justify-content-center row" >


        <div class="d-flex flex-column col-md-8 mb-3">
    @csrf
      <input name="user_id" value="{{auth()->user()->id}} "hidden>
    <div class=" align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                                    
    <div class="d-flex flex-row align-items-center commented-user ml-3">
        <div class="profile-image mr-3">
            <img class="rounded-circle" 
            src="{{ auth()->user()->userSetting && auth()->user()->userSetting->photo !== null 
                ? asset('storage/app/public/' . auth()->user()->userSetting->photo) 
                : asset('assets/admin/dist/img/user2-160x160.jpg') }}" 
            alt="User Photo"
          width="70">
        </div>
        <h5 class="mr-2">{{auth()->user()->username}}</h5>
     
    
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
    </div>
    
    <div class="form-group">
        <label for="body">Body</label>
        <textarea id="body" name="body" rows="3" class="form-control" placeholder="Enter body text"></textarea>
    </div>
    <button class="btn btn-primary ml-2" type="submit">Post</button>

    

    </div>                    


</div>
</div>
</div>
</form>
@endsection