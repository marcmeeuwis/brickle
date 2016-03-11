<?php

namespace Doitonlinemedia\Admin\App\Http;

class Kernel extends \App\Http\Kernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'admin.web' => [
            \Krucas\Notification\Middleware\NotificationMiddleware::class,
        ]
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin.auth' => \Doitonlinemedia\Admin\App\Http\Middleware\Authenticate::class,
        'admin.guest' => \Doitonlinemedia\Admin\App\Http\Middleware\RedirectIfAuthenticated::class,
    ];
}
