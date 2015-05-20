<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Factory as Socialite; 
use Auth;
use App\User;
use App\FacebookData;

class FacebookController extends Controller {

	public function __construct(Socialite $socialite)
	{
		$this->socialite = $socialite;
	}

	public function fbLogin(Request $request)
	{
		if(!$request->has('code')) //testa se o request veio com um codigo de retorno do fb
		{
			//não tem código, redireciona pra autorização do fb
			return $this->socialite->driver('facebook')->redirect();
		}

		//procura se tem algum email cadastrado nesse perfil, se nao tiver cadastra um novo
		$user = $this->findByEmailOrCreate($this->getFacebookUser());
		
		Auth::login($user);

		return view('home');
	}

	private function getFacebookUser()
	{
		return $this->socialite->driver('facebook')->user();
	}

	private function findByEmailOrCreate($userData)
	{
		//Procura/Cria o usuário com base no email cadastrado no Fb
		$user = User::firstOrCreate([
			'email' => $userData->email
		]);

		//Atualiza o usuário com os dados do Fb
		$user->username = $userData->name;
		$user->avatar = $userData->avatar;
		$user->save();
		$userData->user_birthday = '21-12-1990';

		//Atualiza a tabela de dados do Fb
		$facebookData = $user->facebookData ? $user->facebookData : new FacebookData();
		$facebookData->user_birthday = $userData->user_birthday;
		$facebookData->user_hometown = $userData->user_hometown;
		$facebookData->user_likes = $userData->user_likes;
		$facebookData->user_location = $userData->user_location;
		$user->facebookData()->save($facebookData);
			
		return $user;
	}

}
