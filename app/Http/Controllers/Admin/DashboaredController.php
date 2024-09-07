<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminInfoRequest;
use App\Http\Requests\UserInfoRequest;
use App\Models\AdminSetting; 
use App\Models\UserSetting; 
use App\Models\Post; 
use App\Models\User; 
use App\Models\Comment; 
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboaredController extends Controller
{
    public function index()
    {
        $posts = Post::all(); 
        $userCount=User::all()->count();
        $postCount=Post::all()->count();
        $commentCount=Comment::all()->count();

        $postsRecent = Post::where('created_at', '>=', Carbon::now()->subDay())->count();
        $userRecent = User::where('created_at', '>=', Carbon::now()->subDay())->count();
        return view('admin.dashboared', compact('posts','commentCount','postCount','userCount','postsRecent','userRecent'));
    }
    public function showinfo (){

        return view ('admin.adminshowsettings');
    }
    public function addInfo (){

        return view ('admin.adminsettings');
    }

    public function submitinfo(AdminInfoRequest $request)
    {
   
        $validated = $request->validated();

        // Get the currently authenticated user
        $user = auth()->user();
        
        // Retrieve the existing photo path from the user's admin settings
        $existingPhoto = $user->adminSetting->photo ?? null;

        // Handle file upload for the photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('admin_photos', 'public');
        } else {
            $photoPath = $existingPhoto; // Use the existing photo if no new file is uploaded
        }

        // Save or update the admin's info in the database
        $adminSetting = AdminSetting::where('admin_id', $user->id)->first();

        if ($adminSetting) {
            // Update the existing record
            $adminSetting->update([
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'photo' => $photoPath,
            ]);
            session()->flash('success', 'Information updated successfully');
            return redirect()->route('admin.showinfo');

        } else {
            // Create a new record if it does not exist
            AdminSetting::create([
                'admin_id' => $user->id,
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'photo' => $photoPath,
            ]);
            session()->flash('success', 'Information created successfully');
            return redirect()->route('admin.showinfo');}

    }

    public function showallpost()
    {
        $posts = Post::all(); 
        
        return view('admin.showallpost', compact('posts'));
    }
    public function showsingelpost($id)
    {
        $post = Post::where('id', $id)->first(); 
        return view('admin.showsingelpost', compact('post'));
    }
    
    

    // UserInfo
    public function showalluser()
    {
        $users = User::all(); 
        
        return view('admin.showalluser', compact('users'));
    }

    public function showuserinfo ($id){

        $user = User::where('id', $id)->first(); 

        return view ('admin.showsingleuser', compact('user'));
    }
    public function adduserInfo ($id){

        $user = User::where('id', $id)->first(); 
        return view ('admin.usersettings', compact('user'));
    }

    public function submituserinfo(UserInfoRequest $request)
    {
        
        $validated = $request->validated();
        
       
       
        
        // Retrieve the existing photo path from the user's user settings
        $existingPhoto = $user->userSetting->photo ?? null;

        // Handle file upload for the photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('user_photos', 'public');
        } else {
            $photoPath = $existingPhoto; // Use the existing photo if no new file is uploaded
        }

        // Save or update the admin's info in the database
        $userSetting = UserSetting::where('user_id', $request['user_id'])->first();

        if ($userSetting) {
            // Update the existing record
            $userSetting->update([
                'user_id' =>$request['user_id'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'photo' => $photoPath,
            ]);
            session()->flash('success', 'Information updated successfully');
            return redirect()->route('admin.showuserinfo',$request['user_id']) ;

        } else {
            // Create a new record if it does not exist
            UserSetting::create([
                'admin_id' => $user->id,
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'photo' => $photoPath,
            ]);
            session()->flash('success', 'Information created successfully');
            return redirect()->route('admin.showuserinfo',$request['user_id']) ;}

    }

    

    
    
    
    
}
