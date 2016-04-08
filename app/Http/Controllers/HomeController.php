<?php

namespace App\Http\Controllers; //Add this line

use Illuminate\Http\Request; //Add this line
use App\Http\Requests; //Add this line
use App\Http\Controllers\Controller; //Add this line
use App\Models\Post;
use App\Models\Favorite;
use App\Models\User;
use Auth;

class HomeController extends Controller {

    public function getIndex() {
    	
    	$posts = Post::orderBy('created_at', 'desc')
    						->paginate(6);
    						
    	$favorites = [];
    	if(Auth::check()) {
    		$userid = Auth::user()->id;
    		$favorites = Favorite::where('userid', $userid)->get();
    	}

      	return view('index', ['posts' => $posts, 'favorites' => $favorites]); 
    }

}