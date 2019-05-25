<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;
class SuperAdminController extends Controller
{
    public function index(){
    	// $this->authCheck();    	
    	return view('admin.admin_dashboard');
    }
    // public function test(){
    //     return view('admin.admin_content');
    // }
    public function admin_form(){
        return view('admin.admin_form_layout');
    }
    public function logout(){
    	// Session::put('admins_name', '');
    	// Session::put('admins_id', '');    	
    	// Session::put('message', "You have successfully logout");
    	// return Redirect('/admin');
    }
    public function authCheck(){
    	// $admins_id = Session::get('admins_id');
    	// if (isset($admins_id)) {
    	// 	return;
    	// } else {
    	// 	return Redirect('/admin')->send();
    	// }
    }
}
