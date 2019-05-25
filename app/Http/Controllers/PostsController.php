<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use Session;
//use Image;
use File;
//session start();

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function addPosts(){
    	$contacts = DB::table('categories')
            ->where('categories_type', 'published')
            ->get();
    	return view('posts.posts_form')
    			->with('data', $contacts);
    }
    public function insertPosts(Request $request)
    {
        $data = array();
        $data['posts_title'] = $request->posts_title;
        $data['categories_name'] = $request->categories_name;
        $data['posts_short_description'] = $request->posts_short_description;
        $data['posts_long_description'] = $request->posts_long_description;
        $data['posts_author'] = $request->posts_author;
        $data['categories_type'] = $request->categories_type;
        $data['posts_hit_count'] = 0;
        $data['created_at']  = Carbon::now();
        $data['updated_at']  = Carbon::now();

        $files = $request->file('posts_image');
        $filename = $files->getClientOriginalName();
        $extension = $files->getClientOriginalExtension();
        $picture = date('His') . $filename;
        $image_url = 'post_images/' . $picture;
        $destinationPath = base_path() . '/public/post_images/';

        $success = $files->move($destinationPath, $picture);

        if ($success) {
            $data['posts_image'] = $image_url;
            $query = DB::table('posts')
                ->insert($data);
            Session::put('message', 'Successfully Post Created');
            return redirect('/add-new-post');
        } else {
            $error = $files->getErrorMessage();
            return $error;
        }
    }

    public function managePost(){
        $data = DB::table('posts')
            ->get();
        return view('admin.admin_manage_post')
            ->with('data', $data);
    }

    public function deletePost($posts_id){
        $contacts = DB::table('posts')
            ->where('posts_id', $posts_id)
            ->first();
        $query = DB::table('posts')
                ->where('posts_id', $posts_id)
                ->delete();
        if($query){
            Session::put('message', 'Successfully Deleted!');
            unlink($contacts->posts_image);
            return redirect('/manage-post');
        }else{
            Session::put('exception', 'Failed To Update!');
            return redirect('/manage-post');
        }
    }

    public function getUpdatePost($posts_id){
        $contacts = DB::table('posts')
            ->where('posts_id', $posts_id)
            ->first();
        $contact = DB::table('categories')
            ->where('categories_type', 'published')
            ->get();

        return view('posts.post_update_form')
            ->with('contacts', $contacts)
            ->with('data', $contact);
    }

    public function updatePost(Request $request){
        $data = array();

        $data['posts_title'] = $request->posts_title;
        $data['posts_short_description'] = $request->posts_short_description;
        $data['posts_long_description'] = $request->posts_long_description;
        $data['posts_author'] = $request->posts_author;
        $data['categories_name'] = $request->categories_name;
        $data['categories_type'] = $request->categories_type;
        $data['updated_at']  = Carbon::now();

        if($_FILES['post_image']['name'] == ''){
            $data['posts_image'] = $request->posts_image;
            DB::table('posts')
                ->where('posts_id', $request->posts_id)
                ->update($data);
            Session::put('message', 'Successfully Update New Categories!');
            return redirect('/manage-post');
        } else{
            $files = $request->file('post_image');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $picture = date('His') . $filename;
            $image_url = 'post_images/' . $picture;
            $destinationPath = base_path() . '/public/post_images/';

            $success = $files->move($destinationPath, $picture);

            if ($success) {
                $data['posts_image'] = $image_url;
                $query = DB::table('posts')
                    ->where('posts_id', $request->posts_id)
                    ->update($data);
                Session::put('message', 'Successfully Update New Categories!');
                unlink($request->posts_image);
                return redirect('/manage-post');
            } else {
                Session::put('exception', 'Failed To Update!');
                return redirect('/manage-post');
            }
        }

    }

    public function blogDetails($posts_id){
        $categories = DB::table('categories')
            ->orderBy('categories_id', 'ASC')
            ->where('categories_type', 'published')
            ->get();

        $posts = DB::table('posts')
            ->orderBy('posts_id', 'ASC')
            ->where('categories_type', 'published')
            ->where('posts_id', $posts_id)
            ->get();

        $value = DB::table('posts')
            ->orderBy('posts_id', 'ASC')
            ->where('categories_type', 'published')
            ->where('posts_id', $posts_id)
            ->first();

        $data['posts_hit_count'] = $value->posts_hit_count+1;
        $updateHit = DB::table('posts')
             ->where('posts_id', $posts_id)
             ->update($data);

        $recentPosts = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->where('categories_type', 'published')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();

        $comments = DB::table('post_commnets')
            ->where('posts_id', $posts_id)
            ->get();

        return view('posts.single_post')
            ->with('data', $categories)
            ->with('posts', $posts)
            ->with('recent', $recentPosts)
            ->with('p_post', $popular)
            ->with('value', $value)
            ->with('comments', $comments);
    }
    public function blogDetailsCategory($categories_name){
        $posts = DB::table('posts')
            ->orderBy('posts_id', 'ASC')
            ->where('categories_name', $categories_name)
            ->where('categories_type', 'published')
            ->get();

        $categories = DB::table('categories')
            ->orderBy('categories_id', 'ASC')
            ->where('categories_type', 'published')
            ->get();

        $recentPosts = DB::table('posts')
            ->orderBy('posts_id', 'DESC')
            ->where('categories_type', 'published')
            ->get();

        $popular = DB::table('posts')
            ->where('categories_type', 'published')
            ->orderBy('posts_hit_count', 'DESC')
            ->get();

        if ($posts) {
            return view('posts.posts_category')
                ->with('blogDetails', $posts)
                ->with('data', $categories)
                ->with('recent', $recentPosts)
                ->with('p_post', $popular);
        } else {
            Session::put('message', 'No Posts Yet!');
            return redirect('posts.posts_category');
        }

    }

    public function addComment(Request $request){
        $data = array();
        $data['posts_id'] = $request->posts_id;
        $data['posts_commentor_name'] = $request->posts_commentor_name;
        $data['posts_commentor_email'] = $request->posts_commentor_email;
        $data['posts_comment_body'] = $request->posts_comment_body;
        $data['created_at']  = Carbon::now();
        $data['updated_at']  = Carbon::now();

        $query = DB::table('post_commnets')
            ->insert($data);

        if ($query) {
            Session::put('message', 'Comment Added Successfully!');
            return redirect('blog-details/'.$request->posts_id);
        } else {
            Session::put('exception', 'Failed To Add Comment!');
            return redirect('blog-details/'.$request->posts_id);
        }
    }
}
