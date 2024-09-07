<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\User; 
class LoginController extends Controller
{
      public function show_login_view(){
      
       return view('front.auth.login');
      }

      public function login(LoginRequest $request){
       
         if(auth()->guard('user')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
            {
         return redirect()->route('front.dashboard'); 
      }else{
      
               return redirect()->route('front.showlogin')->with(['error' => 'error!!']);; 
      }
      }


      public function show_singup_view(){
      
        return view('front.auth.signup');
       }
 

       public function signup(SignupRequest $request)
       {
           // Validate the incoming request data (this is handled by SignupRequest)
           $validated = $request->validated();
       

           // Create a new user with the validated data
           $user = User::create([
               'name' => $validated['name'],
               'username' => $validated['username'],
               'email' => $validated['email'],
               'password' => Hash::make($validated['password']), // Hash the password
           ]);
       
           // Redirect to the login page with a success message if the user is created
           if ($user) {
            return redirect()->route('front.showlogin')->with('success', 'Your account has been created. Please log in.');
           }
       
           // If something went wrong, redirect to the signup page with an error message
           return redirect()->route('front.showsignup')->with('error', 'There was an issue creating your account. Please try again.');
       }
       




      public function logout(){
        
         auth()->logout();
         return redirect()->route('front.showlogin');
      }




}