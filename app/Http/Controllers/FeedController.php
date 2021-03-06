<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class FeedController extends Controller {

    public function __construct()
    {
        //Só passa se estiver logado
        $this->middleware('auth');
    }

    // Compartilha os posts para a view de feed
    public function getFeeds($view)
    {
        $posts = Post::getMaisrelevantes()->keyBy('id');
        $view->with('posts', $posts);
    }

    public function getPosts($pagina)
    {
        $posts = Post::getMaisrelevantes()->keyBy('id');
        $posts_total = count($posts);
        $posts = $posts->slice($pagina*env('QUANTIDADE_FEED_POST'), env('QUANTIDADE_FEED_POST'), true);
        $pagina++;
        return view('feed', compact('posts', 'pagina'));
    }

}
