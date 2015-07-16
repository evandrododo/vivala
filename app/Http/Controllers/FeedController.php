<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

use Illuminate\Http\Request;

class FeedController extends Controller {

	public function __construct(){
		//Só passa se estiver logado
		$this->middleware('auth');
	}

	// Compartilha os posts para a view de feed
	public function getFeeds($view){
		$posts = Post::getUltimos();
		$view->with('posts', $posts);
	}

}
