<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User; 
use App\Models\Reply; 
use App\Models\Comment;

class UserCrude_PCR_Controller extends Controller
{

    public function showedaddform (){


        return view ('front.Crud_PCR.showedaddform');

    }
    public function createPCR(Request $request, $id, $type)
    {
      
        // Validate the request based on the type
    
    
        switch ($type) {
            case 'Comment':
                // Create a comment
                $validated = $request->validate([
                    'content' => 'required|string|max:255', 

                ]);
                $post = Post::find($id); 
                if ($post) {
                    Comment::create([
                        'post_id' => $post->id,
                        'user_id' => auth()->user()->id, // assuming user is logged in
                        'comment' => $validated['content'],
                    ]);
                    return redirect()->back()->with('success', 'Comment added successfully.');
                }
                return redirect()->back()->with('error', 'Post not found.');
    
            case 'Post':
                // Create a post

                $validated = $request->validate([
                    'content' => 'required|string|max:255', 
                    'title' => 'required|string|max:255', 
                     
                ]);
                Post::create([
                    'user_id' => auth()->user()->id, 
                    'title' => $request->input('title'), 
                    'body' => $validated['content'],
                ]);
                return redirect()->route('front.showallpost')->with('success', 'Post created successfully.');
    
            case 'Reply':
                // Create a reply to a comment

                $validated = $request->validate([
                    'content' => 'required|string|max:255', 
                     
                ]);
                $comment = Comment::find($id); 
                if ($comment) {
                    Reply::create([
                        'comment_id' => $comment->id,
                        'user_id' => auth()->user()->id, // assuming user is logged in
                        'reply' => $validated['content'],
                    ]);
                    return redirect()->back()->with('success', 'Reply added successfully.');
                }
                return redirect()->back()->with('error', 'Comment not found.');
    
            default:
                return redirect()->back()->with('error', 'Invalid type specified.');
        }
    }
    
    public function createPost(Request $request){
               // Create a post

               $validated = $request->validate([
                'body' => 'required|string|max:255', 
                'title' => 'required|string|max:255', 
                 
            ]);
            Post::create([
                'user_id' => auth()->user()->id, 
                'title' => $request->input('title'), 
                'body' => $validated['body'],
            ]);
            return redirect()->route('front.showamypost')->with('success', 'Post created successfully.');

    }


    public function showeditPCR ($id, $type){


        switch ($type) {
            case 'Comment':
                $comment = Comment::find($id);

                // Check if the comment exists
                if ($comment) {
                    // Retrieve the post associated with the comment
                    $post = Post::find($comment->post_id);
        
                    // Check if the post exists
                    if ($post) {
                        // Pass the post object to the view
                        return view('front.Crud_PCR.showeditPCR', compact('post'));
                    } else {
                        // Handle the case where the post was not found
                        return redirect()->back()->with('error', 'Post not found.');
                    }
                } else {
                    // Handle the case where the comment was not found
                    return redirect()->back()->with('error', 'Comment not found.');
                
                }
 
    
            case 'Post':
                $post = Post::where('id', $id)->first(); 

                
            return view ('front.Crud_PCR.showeditPCR', compact('post'));

            default:
                return redirect()->back()->with('error', 'error please try again');
        }
      


        return view ('front.Crud_PCR.showeditPCR', compact('post'));

    }



    public function editPCR(Request $request, $id, $type)
    {

        switch ($type) {
            case 'Comment':
                $request->validate([
                    'comment' => 'required|string|max:255',
                ]);
                
                $record = Comment::find($id);
                
                if (!$record) {
                    return redirect()->back()->with('error', 'Comment not found.');
                }
                
                $record->update([
                    'comment' => $request->input('comment'),
                ]);
                // dd('request',$request);

                $post = Post::find($record->post_id);
                // $id=$post->id;

                return redirect()->route('front.showsingelpost', $post->id)->with('success', 'Comment updated successfully.');
    
                case 'Post':
                $request->validate([
                    'title' => 'required|string|max:255',
                    'body' => 'required|string',
                ]);
    
                $record = Post::find($id);
    
                if (!$record) {
                    return redirect()->back()->with('error', 'Post not found.');
                }
    
                $record->update([
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                ]);
    
                return redirect()->route('front.showsingelpost', $id)->with('success', 'Post updated successfully.');
    
            default:
                return redirect()->back()->with('error', 'Invalid type specified.');
        }
    }

    public function deletePCR($id, $type)
    {
        switch ($type) {
            case 'Comment':
                // Delete a comment
                $comment = Comment::find($id);
                if ($comment) {
                    $comment->delete();
                    return redirect()->back()->with('success', 'Comment deleted successfully.');
                }
                return redirect()->back()->with('error', 'Comment not found.');

            case 'Post':
                // Delete a post
                $post = Post::find($id);
                if ($post) {
                    $post->delete();
                    return redirect()->route('front.dashboard')->with('success', 'Post deleted successfully.');
                }
                return redirect()->route('front.dashboard')->with('error', 'Post not found.');

            

            default:
                return redirect()->back()->with('error', 'Invalid type specified.');
        }
    }
    
   }
    



