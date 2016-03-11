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
        \DoitOnlineMedia\Admin\App\Providers\ModuleServiceProvider::class,
        \DoitOnlineMedia\Admin\Modules\Developer\Providers\DeveloperServiceProvider::class,
        \DoitOnlineMedia\Admin\App\Providers\ComposerServiceProvider::class,
        \Laracasts\Utilities\JavaScript\JavaScriptServiceProvider::class,
        \Krucas\Notification\NotificationServiceProvider::class,
    ],

    // Package aliases
    'aliases' => [
        'RouteHelper' => \DoitOnlineMedia\Admin\App\Helpers\RouteHelper::class,
        'Module' => \Pingpong\Modules\Facades\Module::class,
        'PropertyHelper' => \DoitOnlineMedia\Admin\Modules\Developer\Helpers\PropertyHelper::class,
        'Notification' => \Krucas\Notification\Facades\Notification::class,
    ]
];