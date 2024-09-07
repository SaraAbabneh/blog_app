@extends('layouts.front')
@section('title')
    My Post
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
    align-items: center;
    margin-right: 10px;     }

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
    Show My Post
@endsection

@section('contentheaderlink')
    <a href="{{ route('front.dashboard') }}">Home </a>
@endsection


@section('contentheaderactive')
     Post
@endsection



@section('contentheader')
@endsection


@section('content')


<div class="container mt-5 mb-5" >
        <div class="d-flex justify-content-center row" >
            @if (session('success'))
            <div id="alert-success" class="alert alert-success alert-dismissible fade show col-md-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div id="alert-error" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <div class="d-flex flex-column col-md-8">
                <div class=" align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                            
                    <div class="d-flex flex-row align-items-center commented-user ml-3">
                        <div class="profile-image mr-3">
                            <img class="rounded-circle" src="{{ auth()->user()->userSetting && auth()->user()->userSetting->photo !== null 
                            ? asset('storage/app/public/' . auth()->user()->userSetting->photo) 
                            : asset('assets/admin/dist/img/user2-160x160.jpg') }}
                            " class="img-circle elevation-2"
                         width="70">
                        </div>
                        <h5 class="mr-2">{{$post->user->username}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{ $post->created_at->diffForHumans() }}</span>
                        @if($post->user_id == auth()->user()->id)
                        <div class="action-texts">
                            <a href="{{ route('front.showeditPCR', ['id' => $post->id, 'type' => 'Post']) }}" class="edit-text" title="Edit">Edit</a>
                            <form action="{{ route('front.deletePCR', ['id' => $post->id, 'type' => 'Post']) }}" method="POST" style="display:inline;">
                                @csrf
                               
                                <button type="submit" class="remove-text" title="Remove">Remove</button>
                            </form>
                        </div>
                      @endif
                      
                    </div>
                    <div class="comment-text-sm " style="margin-left:10px "><span style="font-weight: bold;">{{ $post->title }}.</span>
                    </div>

                    <div class="comment-text-sm " style="margin-left:15px"><span>{{$post->body}}.</span></div>
                    <div class="d-flex justify-content-end">

                        <span class="mr-2 comments">comments&nbsp;</span><span class="bdge mr-1">{{$post->comments->count()}}</span>
                    </div>                    
         

                </div>
                <form action="{{ route('front.createPCR', ['id' => $post->id, 'type' => 'Comment']) }}" method="POST">
                    <div class="coment-bottom bg-white p-2 px-4">
                        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                            <img class="img-fluid img-responsive rounded-circle mr-2" src="{{ auth()->user()->userSetting->photo !== null ? asset('storage/app/public/' . auth()->user()->userSetting->photo) : asset('assets/admin/dist/img/user2-160x160.jpg') }}" width="38">
                                @csrf
                                <input type="text" class="form-control" name="content" placeholder="Add comment" >
                            <button class="btn btn-primary ml-2" type="submit">Comment</button>
                                
                        </div>
                    </div>
                </form>
                @if (isset($post->comments) && $post->comments->count() > 0)
                <div class="coment-bottom bg-white p-2 px-4 mb-5 pb-4">

                    @foreach ($post->comments as $comment)
                    
                         <div class="commented-section my-2 box-shadow py-2">
                            
                            <div class="d-flex flex-row align-items-center commented-user ml-3">
                                <div class="profile-image mr-3">
                                    <img class="rounded-circle" src="{{ auth()->user()->userSetting && auth()->user()->userSetting->photo !== null 
                                    ? asset('storage/app/public/' . auth()->user()->userSetting->photo) 
                                    : asset('assets/admin/dist/img/user2-160x160.jpg') }}
                                    " 
                                    class="img-circle elevation-2"
                                 width="70">
                                </div>
                                <h5 class="mr-2">{{$comment->user->username}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                @if($comment->user_id == auth()->user()->id)
                                <div class="action-texts">
                                    <a href="{{ route('front.showeditPCR', ['id' => $comment->id, 'type' => 'Comment']) }}" class="edit-text" title="Edit">Edit</a>
                                    <form action="{{ route('front.deletePCR', ['id' => $comment->id, 'type' => 'Comment']) }}" method="POST" style="display:inline;">
                                        @csrf
                                       
                                        <button type="submit" class="remove-text" title="Remove">Remove</button>
                                    </form>
                                </div>
                              @endif
                              
                            </div>
                            <div class="comment-text-sm " style="margin-left:90px"><span>{{$comment->comment}}.</span></div>
                            @if (isset($comment->replies) && $comment->replies->count() > 0)
                            <div class="d-flex justify-content-end">
                                <span class="mr-2 comments">Replies&nbsp;</span><span class="bdge mr-1">{{$comment->replies->count()}}</span>
                            </div> 
                            @endif
                        </div>
                        @if (isset($comment->replies) && $comment->replies->count() > 0)
                        <div class="coment-bottom bg-white p-2 px-4 pb-3">

                            @foreach ($comment->replies as $replie)
                            
                                <div class="commented-section mt-2 py-2">
                                    
                                    <div class="d-flex flex-row align-items-center commented-user ml-3">
                                        <div class="profile-image mr-3">
                                            <img class="rounded-circle" src="{{ asset('assets/admin/dist/img/user1-128x128.jpg') }}"
                                        width="70">
                                        </div>
                                        <h5 class="mr-2">{{$replie->user->username}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2 text-sm">{{ $replie->created_at->diffForHumans() }}</span>
                                        @if($replie->user_id == auth()->user()->id)
                                        <div class="action-texts">
                                            <a href="{{ route('front.showeditPCR', ['id' => $replie->id, 'type' => 'Reply']) }}" class="edit-text" title="Edit">Edit</a>
                                            <form action="{{ route('front.deletePCR', ['id' => $replie->id, 'type' => 'Reply']) }}" method="POST" style="display:inline;">
                                                @csrf
                                               
                                                <button type="submit" class="remove-text" title="Remove">Remove</button>
                                            </form>
                                        </div>
                                      @endif                                 
                                    </div>
                                                                         
                                    <div class="comment-text-sm " style="margin-left:90px"><span>{{$replie->reply}}</span></div>
                                  
                                </div>

                            @endforeach
                        </div>
                        @endif
                        
                        

                        @endforeach
                        @else
                    <p> No Comment for this Post</p>
                </div>
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')

<script>
    // Auto-hide messages after 3 seconds
    setTimeout(function() {
        var successAlert = document.getElementById('alert-success');
        var errorAlert = document.getElementById('alert-error');
        
        if (successAlert) {
            successAlert.style.opacity = '0';
            setTimeout(function() { successAlert.remove(); }, 600);
        }
        
        if (errorAlert) {
            errorAlert.style.opacity = '0';
            setTimeout(function() { errorAlert.remove(); }, 600);
        }
    }, 3000);
</script>
@endsection
