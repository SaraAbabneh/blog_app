@extends('layouts.admin')

@section('title')

    Admin Dashboard
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
    Admin Dashboard
@endsection

@section('contentheaderlink')

<a href="{{route('admin.dashboard')}}">Home </a>
@endsection


@section('contentheaderactive')
    view
@endsection



@section('contentheader')

@endsection

@section('content')


  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

        <div class="info-box-content">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <span style="margin-right: 10px;">User</span>
                @if($userRecent > 0)
                <span class="badge badge-info bg-warning" style="margin-left: auto; color:white">{{$userRecent}}</span>
                @else
                0
            @endif
          </div>
          <span class="info-box-number">
            
            @if($userCount > 0)
            {{ $userCount }}
            @else
                0
            @endif
            
           
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-alt"></i></span>

        <div class="info-box-content">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <span style="margin-right: 10px;">Post</span>
                @if($postsRecent > 0)
                <span class="badge badge-info bg-warning" style="margin-left: auto; color:white">{{$postsRecent}}</span>
                @else
                0
            @endif
          </div>
            
        
          
          <span class="info-box-number">
            
            @if($postCount > 0)
            {{ $postCount }}
            @else
                0
            @endif
            
           
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-comment"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Comment</span>
          <span class="info-box-number">
            @if( $commentCount > 0)
            {{$commentCount }}
            @else
                0
            @endif
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>


  </div>
  <!-- /.row -->

    @if (isset($posts) && $posts->count() > 0)




        <div class="container mt-5 mb-5" >
            <div class="d-flex justify-content-center row" >
                @foreach($posts as $post)
            
                    <div class="d-flex flex-column col-md-8 mb-3">
                        <div class=" align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                                    
                            <div class="d-flex flex-row align-items-center commented-user ml-3">
                                <div class="profile-image mr-3">
                                    <img class="rounded-circle" src="{{ asset('assets/admin/dist/img/user1-128x128.jpg') }}"
                                width="70">
                                </div>
                                <h5 class="mr-2">{{$post->user->username}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{ $post->created_at->diffForHumans() }}</span>
                        
                            
                            </div>
                            <div class="comment-text-sm " style="margin-left:10px "><span style="font-weight: bold;">{{ $post->title }}.</span>
                            </div>

                            <div class="comment-text-sm " style="margin-left:15px"><span>{{$post->body}}.</span></div>
                            <div class="d-flex justify-content-end">

                                <span class="mr-2 comments">comments&nbsp;</span><span class="bdge mr-1">{{$post->comments->count()}}</span>
                            </div>                    
                

                        </div>
                        @if (isset($post->comments) && $post->comments->count() > 0)
                        @foreach ($post->comments as $comment)
                        <div class="coment-bottom bg-white p-2 px-4 mb-5 pb-4">

                            
                                <div class="commented-section my-2 box-shadow py-2">
                                    
                                    <div class="d-flex flex-row align-items-center commented-user ml-3">
                                        <div class="profile-image mr-3">
                                            <img class="rounded-circle" src="{{ asset('assets/admin/dist/img/user1-128x128.jpg') }}"
                                        width="70">
                                        </div>
                                        <h5 class="mr-2">{{$comment->user->username}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                    
                                    
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
                                            
                                            </div>
                                                                                
                                            <div class="comment-text-sm " style="margin-left:90px"><span>{{$replie->reply}}</span></div>
                                        
                                        </div>

                                    </div>
                                    @endforeach
                                @endif
                                
                                

                            @endforeach
                        
                        </div>
                        @endif

                    </div>

                    <br>
                    @endforeach
            </div>
        </div>
    @else 
      <p> no Post yet</p>
    @endif
@endsection
