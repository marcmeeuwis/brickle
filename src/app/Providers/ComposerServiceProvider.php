<?php

namespace Doitonlinemedia\Admin\App\Providers;

use Doitonlinemedia\Admin\App\Repositories\Document\DocumentRepository;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    protected $moduleServiceProvider;

    /**
     * AdminServiceProvider constructor.
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

//        view()->composer('admin::content.layout', function($view) use($documentRepository) {
//            $documents = $documentRepository->all();
//            $view->with('documents', $documents);
//        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
