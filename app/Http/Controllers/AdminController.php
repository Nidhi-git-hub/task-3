<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request){
    	if($request->isMethod('post')){
			$data = $request->all();
			if(Auth::attempt(['email'=>$data['username'],'password'=>$data['password']])){
				return redirect('admin/dashboard');
			}else{
				return redirect('/admin')->with('flash_message_error','Invalid email or password');
			}
		}
    	return view('Admin.admin_login');
    }
    public function dashboard(){
    	return view('Admin.dashboard');
    }
    public function logout(){
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success','Logged out successfully!');
    }
}
