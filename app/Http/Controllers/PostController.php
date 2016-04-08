<?php

namespace App\Http\Controllers; //Add this line

use Illuminate\Http\Request; //Add this line
use App\Http\Requests; //Add this line
use App\Http\Controllers\Controller; //Add this line
use Auth;
use App\Models\Post;
use App\Models\Favorite;

class PostController extends Controller {

    public function getNewPost() { 
       return view('posts.newpost'); 
    }

    public function postNewPost(Request $request) {
    	return $this->newpost($request);
    }

    public function newPost(Request $request) {
    	// Input field values
    	$fields = $request->all();
    	// User ID
    	$userid = $request->user()->id;
    	
    	//TODO: validate
    	$post = new Post;
    	$post->userid = $userid;
    	$post->post_title = $fields['post_title'];
    	$post->post_text = $fields['post_text'];
    	$post->post_imgurl = $fields['post_imgurl'];

    	$post->save();

    	return back()->withInput();
    }

    public function getFavorites() {
        $favorites = [];
        if(Auth::check()) {
        $userid = Auth::user()->id;

        $favoritesid = Favorite::where('userid', $userid)->orderBy('created_at', 'desc')->take(5)->pluck('postid');

        //foreach ($favoritesid as $favoriteid => $postid) {
            $favorites = Post::wherein('id', $favoritesid)->paginate(6);        
        //}
        }

    	return view('posts.favorites', ['favorites' => $favorites]);
    }

    public function addFavorite($postid) {
        $favorite = new Favorite;

        $userid = Auth::user()->id;

        $favorite->postid = $postid;
        $favorite->userid = $userid;

        $favorite->save();

        return back();
    }

    public function removeFavorite($postid) {
        $userid = Auth::user()->id;

        Favorite::where(['userid' => $userid, 'postid' => $postid])->delete();

        return back();
    }
}