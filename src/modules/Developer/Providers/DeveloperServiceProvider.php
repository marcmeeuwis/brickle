<?php namespace DoitOnlineMedia\Admin\Modules\Developer\Providers;

use Illuminate\Support\ServiceProvider;

class DeveloperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerConfig();
		$this->registerTranslations();
		$this->registerViews();

		$this->publishes([__DIR__.'/../Assets' => 'public/modules/developer/'], 'developer_assets');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		$this->routes();
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('developer.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'developer'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/developer');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom([$viewPath, $sourcePath], 'developer');
	}

	/**
	 * Register translations.
	 *
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/developer');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'developer');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'developer');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	public function routes()
	{
		$namespace = 'DoitOnlineMedia\Admin\Modules\Developer\Http\Controllers';
		$path = __DIR__.'/../Http/';

		app()->make('router')->group([

			'namespace' => $namespace,
			'middleware' => ['web','admin.auth'],
			'prefix' => config('admin.cms_path').'/developer',
			'as' => 'admin::developer.'

		],function() use($path) {

			$file = $path.'BackendRoutes.php';
			if(file_exists($file)) require_once($file);

		});

		app()->make('router')->group(['namespace' => $namespace], function() use($path) {
			$file = $path.'FrontendRoutes.php';
			if(file_exists($file)) require_once($file);
		});
	}


}
