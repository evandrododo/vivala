<?php namespace App\Http\Controllers;

use App;
use Auth;
use Request;
use App\Foto;
use App\Notificacao;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends VivalaBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$novoPost = new Post();
		$novoPost->descricao = Request::input('descricao');
		$novoPost->tipo_post = Request::input('tipo_post');

                $novoPost->relevancia = 999;
                // Caso seja uma foto ou status, coloca relevancia maior
                if($novoPost->tipo_post == 'foto')
                    $novoPost->relevancia_rate = 20;
                elseif($novoPost->tipo_post == 'status')
                    $novoPost->relevancia_rate = 15;
                else
                    $novoPost->relevancia_rate = 10;

                // Relevancia adicionada 5 vezes na criação
                $novoPost->relevancia += $novoPost->relevancia_rate*5;


		//Salvando novoPost para entidadeAtiva
		Auth::user()->entidadeAtiva->posts()->save($novoPost);

		// Adiciona a foto no post através do id recebido
		$idFoto = Request::input('fotos');//ta no plural mas vem só uma por enquanto
		if(is_numeric($idFoto)) {
			$Foto = Foto::find($idFoto);
			$novoPost->fotos()->save($Foto);
		}

		return redirect('conectar');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $secao = null)
	{
		$Post = Post::findOrFail($id);
		$comentarios = $Post->comentariosByDate();
		$view = view('post.show', compact('Post', 'comentarios'));

		if(Request::ajax() && $secao == "comentarios") {
			$viewComentarios = view('post._comentarios', compact('comentarios'));
      return $viewComentarios; // this will only return whats in the content section
    }

		return $view;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $post = Post::findOrFail($id);

            $entidadeAtiva = Auth::user()->entidadeAtiva;

            //Se o post a ser deletado não pertence à entidade ativa
            if ($entidadeAtiva == $post->author) {
                $post->delete();
            } else {
                App::abort(403, 'Voce nao tem permissão para deletar um post que não te pertence.');
            }

            return view('home');
	}


	/**
	 * Metodo para dar Share em posts, replica o post com $id
	 * @param  $id 			Id do post a ser shareado
	 */
	public function getSharepost($id)
	{

		$sourcePost = Post::findOrFail($id);
		$entidadeAtiva = Auth::user()->entidadeAtiva;

		//Se o post a ser shareado for da entidadeAtiva em questão...
		if ($entidadeAtiva == $sourcePost->author) {
			App::abort(403, 'Voce nao tem permissão para sharear os proprios posts!');
		}

		//Criando novo post, presenvando relações. e setando o shared_from
		$novoPost = $sourcePost->replicate();
		$novoPost->shared_from = $id;

                // Aumenta a relevancia do post que está sendo shareado
                $sourcePost->relevancia += $sourcePost->relevancia_rate;

		//Salvando o post para a entidadeAtiva atual
		$entidadeAtiva->posts()->save($novoPost);

		//Se tiver foto copiar ela tambem
		if ($sourcePost->fotos != null) {
			$novaFoto = $sourcePost->fotos->replicate();
			$novoPost->fotos()->save($novaFoto);
		}

		//Criando nova notificacao
		$novaNotificacao = Notificacao::create([
			'titulo'			=>	'Compartilharam seu post',
			'mensagem' 			=> 	$entidadeAtiva->apelido . ' compartilhou seu post',
			'tipo_notificacao'	=>	'share',
			'url'				=>	$novoPost->url
			]);

		//associando a entidadeAtiva com o from e o autor do comentario likeado como target
		$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
		$sourcePost->author->notificacoes()->save($novaNotificacao);
		$novaNotificacao->push();

		//Assegurando que as relações foram atualizadas
		Auth::user()->entidadeAtiva->push();
		return redirect('conectar');
	}

	/**
	 * Seta o like da entidadeAtiva atual para um post específico
	 *
	 * @param  [integer] id do post
	 * @return
	 */
	public function getLikepost($id)
	{
		//Verifica se o post existe
		$post = Post::findOrFail($id);

		//Testo se o usuário está logado
		$user = Auth::user();
		$entidadeAtiva = $user->entidadeAtiva;

		//Se já tiver dado like no post com esse ID,
		//consigo encontrá-lo pelo Collection->find()
		$alreadyLiked = $entidadeAtiva->likePost->find($post->id);

		if (!$alreadyLiked) {
			//Salvando relação (Dando o like finalmente!)
			$entidadeAtiva->likePost()->attach($post->id);
			// É um like, logo o like vai para o estado 1
			$tipoLikeUser = true;

                        // Aumenta a relevância do post que recebeu o like
                        $post->relevancia += $post->relevancia_rate;
                        $post->push();

			//Só levantar uma notificacao se nao for em um post seu ou de alguma de suas entidades
			if($entidadeAtiva->user->id != $post->author->user->id)
			{
				$lang = App::getLocale();
				switch($lang){
					case 'pt':
						$string[0] = 'Curtiram sua Postagem';
						$string[1] = ' curtiu sua postagem.';
					break;
					case 'en':
						$string[0] = 'Post Like';
						$string[1] = ' likes your post.';
					break;
					default:
						$string[0] = 'Curtiram sua Postagem';
						$string[1] = ' curtiu sua postagem.';
				}
				$novaNotificacao = Notificacao::create([
					'titulo'			=>	$string[0],
					'mensagem' 			=> 	$entidadeAtiva->apelido . $string[1],
					'tipo_notificacao'	=>	'like_post',
					'url'				=>	$post->url
					]);

				//associando a entidadeAtiva com o from e o autor do comentario likeado como target
				$entidadeAtiva->fromNotificacoes()->save($novaNotificacao);
				$post->author->notificacoes()->save($novaNotificacao);
				$novaNotificacao->push();
			}

		} else {
			// Retiro o like do post pelo ID do post
			$entidadeAtiva->likePost()->detach($post->id);
			// É um dislike, logo o like volta para para o estado 0
			$tipoLikeUser = false;
		}

		// Retorna a quantidade de likes para utilizar na view e se o user deu like ou deslike
	    return array('qtdLikes' => $post->getQuantidadeLikes(), 'tipoLikeUser' => $tipoLikeUser);
	}
}
