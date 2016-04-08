<?php

namespace App\Http\Controllers; //Add this line

use Illuminate\Http\Request; //Add this line
use App\Http\Requests; //Add this line
use App\Http\Controllers\Controller; //Add this line
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Favorite;

class AccountController extends Controller {

	public function getAccount($username) {
		$user = User::where('name', $username)->get();
		$user = $user[0];
		$userposts = Post::where('userid', $user->id)->paginate(6);

		if(Auth::user()->name == $username) {
			return view('account.mypage', ['user' => $user, 'userposts' => $userposts, 'favorites' => Favorite::where('userid', $user->id)->get()]); 
		}else{
			return view('account.userpage', ['user' => $user, 'userposts' => $userposts]);
		}
		
		
	} 
}