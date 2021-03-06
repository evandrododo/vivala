<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
      //Fornece os dados para as views que são chamadas na sidebar
      view()->composer('conectar._sugestoesviajantes', 'App\Http\Controllers\ConectarController@getSugestoesViajantes');
      view()->composer('cuidar.sugestoesongs', 'App\Http\Controllers\CuidarController@getSugestoesOngs');
      view()->composer('viajar.sugestoesempresas', 'App\Http\Controllers\ViajarController@getSugestoesempresas');
      //view()->composer('feed', 'App\Http\Controllers\FeedController@getFeeds'); //comentado pra não poluir as outras paginas
      view()->composer('_notificacoesFollow', 'App\Http\Controllers\NotificacaoController@getNotificacoesfollow');
      view()->composer('_notificacoesMsg', 'App\Http\Controllers\NotificacaoController@getNotificacoesMsg');
      view()->composer('_notificacoesGeral', 'App\Http\Controllers\NotificacaoController@getNotificacoesgeral');

      // Passa outras páginas do usuario e dados da entidade ativa no momento
      view()->composer('header', 'App\Http\Controllers\PaginaController@getMenu');

      /* Pegando a lista de todas as rotas do instituto para controlar o logo */
      view()->composer('header', 'App\Repositories\OngRepository@injectArrayRotasInstituto');

	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
      //bindando o registrar comum
      $this->app->bind(
          'Illuminate\Contracts\Auth\Registrar',
          'App\Services\Registrar'
      );

      //bindando a interface com a implementacao,
      //assim o laravel servira automaticamente uma intancia
      //de LoggerRepository quando requisitada nos controllers
      $this->app->bind(
          'App\Interfaces\LoggerRepositoryInterface',
          'App\Repositories\LoggerRepository'
      );

      //bindando a interface com a implementacao,
      //assim o laravel servira automaticamente uma intancia
      //de LocaisRepository quando requisitada nos controllers
      $this->app->bind(
          'App\Interfaces\LocaisRepositoryInterface',
          'App\Repositories\LocaisRepository'
      );

      //bindando a interface com a implementacao,
      //assim o laravel servira automaticamente uma intancia
      //de FotosRepository quando requisitada nos controllers
      $this->app->bind(
          'App\Interfaces\FotosRepositoryInterface',
          'App\Repositories\FotosRepository'
      );

      //bindando a interface com a implementacao,
      //assim o laravel servira automaticamente uma intancia
      //de BuscaCEPRepository quando requisitada nos controllers
      $this->app->bind(
          'App\Interfaces\BuscaCEPRepositoryInterface',
          'App\Repositories\BuscaCEPRepository'
      );
	}
}
