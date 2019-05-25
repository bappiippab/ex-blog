<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AdminController extends Controller
{
    public function index(){
        $contacts = DB::table('categories')
        ->orderBy('categories_id', 'ASC')
        ->where('categories_type', 'published')
        ->get();

        return view('admin.admin_table')
                ->with('data', $contacts);
    }    

    public function addCategories(Request $request){
        $data = array();
        $data['categories_name'] = $request->categories_name;
    	$data['categories_type'] = $request->categories_type;
        // echo $data['categories_name']."_____".$data['categories_type'];
        // exit();
    	$result = DB::table('categories')->insert($data);
    			
    	if ($result) {
            Session::put('message', 'Successfully Added New Categories');
            return redirect('/add-category');
    	} else {
            Session::put('exception', 'Failed To Added');
    		return redirect('/add-category');
    	}
    }
    public function retrive(){
        $contacts = DB::table('categories')
        ->orderBy('categories_id', 'ASC')
        ->get();

        return view('admin.admin_dashboard')
                ->with('data', $contacts);
    }
    public function delete($categories_id){
        $contacts = DB::table('categories')
                ->where('categories_id', $categories_id)
                ->delete();
        if($contacts){
            Session::put('message', 'Successfully Deleted!');
            return redirect('/manage-category');
        }else{
            Session::put('exception', 'Failed To Update!');
            return redirect('/manage-category');
        }        
    }
    public function update($categories_id){
        $contacts = DB::table('categories')
                ->where('categories_id', $categories_id)
                ->first();
        return view('admin.admin_update_form')->with('contacts', $contacts);
    }
    public function updateCategories(Request $request){
        $data = array();
       
        $data['categories_name'] = $request->categories_name;
        $data['categories_type'] = $request->categories_type;
        // echo $data['categories_name']."___".$data['categories_type']."___".$data['categories_id'];
        // exit();
        $result = DB::table('categories')
                ->where('categories_id', $request->categories_id)
                ->update($data);
                
        if ($result) {
            Session::put('message', 'Successfully Update New Categories!');
            return redirect('/manage-category');
        } else {
            Session::put('exception', 'Failed To Update!');
            return redirect('/manage-category');
        }
    }
}
