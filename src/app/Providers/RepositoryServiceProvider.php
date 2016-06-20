<?php

namespace Doitonlinemedia\Admin\App\Providers;

use Illuminate\Support\ServiceProvider;
//use Pingpong\Modules\Facades\Module;
use Doitonlinemedia\Admin\App\Repositories\BaseRepository;
use Doitonlinemedia\Admin\App\Repositories\BaseEloquentRepository;
use Doitonlinemedia\Admin\App\Repositories\CachingBaseRepository;
use Doitonlinemedia\Admin\App\Repositories\DocumentRepository\CachingDocumentRepository;
use Doitonlinemedia\Admin\App\Repositories\DocumentRepository\DocumentRepository;
use Doitonlinemedia\Admin\App\Repositories\DocumentRepository\DocumentEloquentRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {

    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        $this->app->singleton(BaseRepository::class, function(){
            return new CachingBaseRepository(
                new BaseEloquentRepository,
                $this->app['cache.store']
            );
        });

        $this->app->singleton(DocumentRepository::class, function(){
            return new CachingDocumentRepository(
                new DocumentEloquentRepository,
                $this->app['cache.store']
            );
        });


//        $this->app->bind(DocumentRepository::class, DocumentEloquentRepository::class);
    }


}
