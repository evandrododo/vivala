<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\Lang',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.mobile' => 'App\Http\Middleware\MobileAuthenticate',
		'auth.only.desktop' => 'App\Http\Middleware\DesktopOnlyAuthenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
    'admin' => 'App\Http\Middleware\isAdmin',
    'desktop.only' => 'App\Http\Middleware\DesktopOnly'
	];

}
