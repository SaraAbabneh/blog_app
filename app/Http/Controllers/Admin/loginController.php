<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
      public function show_login_view(){
      
       return view('admin.auth.login');
      }

      public function login(LoginRequest $request){

         if(auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
            {
               
         return redirect()->route('admin.dashboard'); 
      }else{
    
       return redirect()->route('admin.showlogin')->with(['error' => 'error!!']); 
      }
      }

      public function logasuser()
{
    // Check if the user is authenticated
 
        $currentUser = auth()->user();
        $username = auth()->user()->username;

        // Find the user by username
        $user = User::where('username', $username)->first();

        if ($user) {
            // Update existing user's details
           
            return redirect()->route('front.dashboard')->with('success', 'User updated successfully.');
        } else {
            // Create a new user if one does not exist
            User::create([
                'username' => $username,
                'password' => Hash::make('Admin@123'),
                'name' => 'admin',
                'email' => 'admin@gmail.com',
            ]);

            return redirect()->route('front.dashboard')->with('success', 'Logged in as user.');
        }
    } 


      public function logout(){
        
         auth()->logout();
         return redirect()->route('admin.showlogin');
      }

}