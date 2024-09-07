<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User; 
use App\Models\Reply; 
use App\Models\Comment; 

class Crude_PCR_Controller extends Controller
{
    public function showeditPCR ($id){
        $post = Post::where('id', $id)->first(); 


        return view ('admin.Crud_PCR.showeditPCR', compact('post'));

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
                    return redirect()->route('admin.showallpost')->with('success', 'Post deleted successfully.');
                }
                return redirect()->route('admin.showallpost')->with('error', 'Post not found.');

            case 'Reply':
                // Delete a reply
                $reply = Reply::find($id);
                if ($reply) {
                    $reply->delete();
                    return redirect()->back()->with('success', 'Reply deleted successfully.');
                }
                return redirect()->back()->with('error', 'Reply not found.');

            default:
                return redirect()->back()->with('error', 'Invalid type specified.');
        }
    }

    public function editPCR(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        $record = Post::find($id); 
    
        if (!$record) {
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        
        $record->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
    

        return redirect()->route('admin.showsingelpost',$id)->with('success', 'Record updated successfully.');
    }
    
}
