<?php

return [
    // CMS root url
    'cms_path' => 'brickle',

    // CMS name
    'cms_name' => 'Brickle',

    // Publish the files to
    'publish_path' => 'vendor/doitonlinemedia/admin',

    // Package service providers
    'providers' => [
        \Pingpong\Modules\ModulesServiceProvider::class,
        \Doitonlinemedia\Admin\App\Providers\ModuleServiceProvider::class,
        \Doitonlinemedia\Admin\Modules\Developer\Providers\DeveloperServiceProvider::class,
        \Doitonlinemedia\Admin\App\Providers\ComposerServiceProvider::class,
        \Doitonlinemedia\Admin\App\Providers\RepositoryServiceProvider::class,
        \Laracasts\Utilities\JavaScript\JavaScriptServiceProvider::class,
        \Krucas\Notification\NotificationServiceProvider::class,
    ],

    // Package aliases
    'aliases' => [
        'RouteHelper' => \Doitonlinemedia\Admin\App\Helpers\RouteHelper::class,
        'Module' => \Pingpong\Modules\Facades\Module::class,
        'PropertyHelper' => \Doitonlinemedia\Admin\Modules\Developer\Helpers\PropertyHelper::class,
        'Notification' => \Krucas\Notification\Facades\Notification::class,
    ]
];