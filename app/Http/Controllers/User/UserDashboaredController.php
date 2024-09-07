<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Models\UserSetting; 
use App\Models\Post; 
use App\Models\Comment; 
use App\Models\User; 
use Illuminate\Http\Request;


class UserDashboaredController extends Controller
{
    public function index()
    {

        $posts = Post::all(); 
        $postCount = Post::where('user_id', auth()->user()->id)->count(); // Count the posts
        $commentCount = Comment::where('user_id', auth()->user()->id)->count(); // Count the posts

        return view('front.dashboared', compact('posts','postCount','commentCount'));
    }

    
    public function showmypost()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get(); 
        
        return view('front.showmypost', compact('posts'));
    }
    public function showamycomment()
    {
        $comments = Comment::where('user_id', auth()->user()->id)->get(); 
        
        return view('front.showamycomment', compact('comments'));
    }

    public function showinfo() {
        // Retrieve the user's settings
        $setting = UserSetting::where('user_id', auth()->user()->id)->first();
    
        // Check if the setting exists (is not null)
        if ($setting) {
            // If the setting exists, show the settings page
            return view('front.showmysettings');
        } else {
            // If the setting does not exist, redirect to the add info page
            return redirect()->route('front.addInfo');
        }
    }
    
    public function addInfo() {
        // Show the form to add new settings
        return view('front.formusersettings');
    }
    

    public function submitinfo(UserInfoRequest $request)
    {
   
        $validated = $request->validated();

        // Get the currently authenticated user
        $user = auth()->user();
        
        // Retrieve the existing photo path from the user's admin settings
        $existingPhoto = $user->userSetting->photo ?? null;

        // Handle file upload for the photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('user_photos', 'public');
        } else {
            $photoPath = $existingPhoto; // Use the existing photo if no new file is uploaded
        }

        // Save or update the admin's info in the database
        $userSetting = userSetting::where('user_id', $user->id)->first();

        if ($userSetting) {
            // Update the existing record
            $userSetting->update([
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'photo' => $photoPath,
            ]);
            session()->flash('success', 'Information updated successfully');
            return redirect()->route('front.showinfo');

        } else {
            // Create a new record if it does not exist
            userSetting::create([
                'user_id' => $user->id,
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'photo' => $photoPath,
            ]);
            session()->flash('success', 'Information created successfully');
            return redirect()->route('front.showinfo');}

    }


    public function showsingelpost($id)
    {
        $post = Post::where('id', $id)->first(); 
        return view('front.showsingelpost', compact('post'));
    }
}
