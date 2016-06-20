<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Doitonlinemedia\\Admin\\AdminDatabaseSeeder' => $baseDir . '/src/database/seeds/DatabaseSeeder.php',
    'Doitonlinemedia\\Admin\\App\\Helpers\\RouteHelper' => $baseDir . '/src/app/Helpers/RouteHelper.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Controllers\\Auth\\AuthController' => $baseDir . '/src/app/Http/Controllers/Auth/AuthController.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Controllers\\Auth\\PasswordController' => $baseDir . '/src/app/Http/Controllers/Auth/PasswordController.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Controllers\\ContentController' => $baseDir . '/src/app/Http/Controllers/ContentController.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Controllers\\HomeController' => $baseDir . '/src/app/Http/Controllers/HomeController.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Controllers\\TestController' => $baseDir . '/src/app/Http/Controllers/TestController.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Kernel' => $baseDir . '/src/app/Http/Kernel.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Middleware\\Authenticate' => $baseDir . '/src/app/Http/Middleware/Authenticate.php',
    'Doitonlinemedia\\Admin\\App\\Http\\Middleware\\RedirectIfAuthenticated' => $baseDir . '/src/app/Http/Middleware/RedirectIfAuthenticated.php',
    'Doitonlinemedia\\Admin\\App\\Models\\AllowedTemplates' => $baseDir . '/src/app/Models/AllowedTemplates.php',
    'Doitonlinemedia\\Admin\\App\\Models\\AllowedType' => $baseDir . '/src/app/Models/AllowedType.php',
    'Doitonlinemedia\\Admin\\App\\Models\\DataType' => $baseDir . '/src/app/Models/DataType.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Document' => $baseDir . '/src/app/Models/Document.php',
    'Doitonlinemedia\\Admin\\App\\Models\\DocumentSettings' => $baseDir . '/src/app/Models/DocumentSettings.php',
    'Doitonlinemedia\\Admin\\App\\Models\\DocumentType' => $baseDir . '/src/app/Models/DocumentType.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Menu' => $baseDir . '/src/app/Models/Menu.php',
    'Doitonlinemedia\\Admin\\App\\Models\\MenuItem' => $baseDir . '/src/app/Models/MenuItem.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Profile' => $baseDir . '/src/app/Models/Profile.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Property' => $baseDir . '/src/app/Models/Property.php',
    'Doitonlinemedia\\Admin\\App\\Models\\PropertyValue' => $baseDir . '/src/app/Models/PropertyValue.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Settings' => $baseDir . '/src/app/Models/Settings.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Tab' => $baseDir . '/src/app/Models/Tab.php',
    'Doitonlinemedia\\Admin\\App\\Models\\Template' => $baseDir . '/src/app/Models/Template.php',
    'Doitonlinemedia\\Admin\\App\\Models\\User' => $baseDir . '/src/app/Models/User.php',
    'Doitonlinemedia\\Admin\\App\\Providers\\AdminServiceProvider' => $baseDir . '/src/app/Providers/AdminServiceProvider.php',
    'Doitonlinemedia\\Admin\\App\\Providers\\ComposerServiceProvider' => $baseDir . '/src/app/Providers/ComposerServiceProvider.php',
    'Doitonlinemedia\\Admin\\App\\Providers\\ModuleServiceProvider' => $baseDir . '/src/app/Providers/ModuleServiceProvider.php',
    'Doitonlinemedia\\Admin\\App\\Providers\\RepositoryServiceProvider' => $baseDir . '/src/app/Providers/RepositoryServiceProvider.php',
    'Doitonlinemedia\\Admin\\App\\Repositories\\BaseEloquentRepository' => $baseDir . '/src/app/Repositories/BaseEloquentRepository.php',
    'Doitonlinemedia\\Admin\\App\\Repositories\\BaseRepository' => $baseDir . '/src/app/Repositories/BaseRepository.php',
    'Doitonlinemedia\\Admin\\App\\Repositories\\DocumentRepository\\DocumentEloquentRepository' => $baseDir . '/src/app/Repositories/DocumentRepository/DocumentEloquentRepository.php',
    'Doitonlinemedia\\Admin\\App\\Repositories\\DocumentRepository\\DocumentRepository' => $baseDir . '/src/app/Repositories/DocumentRepository/DocumentRepository.php',
    'Doitonlinemedia\\Admin\\DataTypeTableSeeder' => $baseDir . '/src/database/seeds/DataTypeTableSeeder.php',
    'Doitonlinemedia\\Admin\\DocTypeTableSeeder' => $baseDir . '/src/database/seeds/DocTypeTableSeeder.php',
    'Doitonlinemedia\\Admin\\DocumentSettingsTableSeeder' => $baseDir . '/src/database/seeds/DocumentSettingsTableSeeder.php',
    'Doitonlinemedia\\Admin\\DocumentTableSeeder' => $baseDir . '/src/database/seeds/DocumentTableSeeder.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Helpers\\DirectoryHelper' => $baseDir . '/src/modules/Developer/Helpers/DirectoryHelper.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Helpers\\PropertyHelper' => $baseDir . '/src/modules/Developer/Helpers/PropertyHelper.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\DataTypeController' => $baseDir . '/src/modules/Developer/Http/Controllers/DataTypeController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\DeveloperController' => $baseDir . '/src/modules/Developer/Http/Controllers/DeveloperController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\DocumentController' => $baseDir . '/src/modules/Developer/Http/Controllers/DocumentController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\DocumentTypeController' => $baseDir . '/src/modules/Developer/Http/Controllers/DocumentTypeController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\PropertyController' => $baseDir . '/src/modules/Developer/Http/Controllers/PropertyController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\TabController' => $baseDir . '/src/modules/Developer/Http/Controllers/TabController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Http\\Controllers\\TestsController' => $baseDir . '/src/modules/Developer/Http/Controllers/TestsController.php',
    'Doitonlinemedia\\Admin\\Modules\\Developer\\Providers\\DeveloperServiceProvider' => $baseDir . '/src/modules/Developer/Providers/DeveloperServiceProvider.php',
    'Doitonlinemedia\\Admin\\ProfileTableSeeder' => $baseDir . '/src/database/seeds/ProfileTableSeeder.php',
    'Doitonlinemedia\\Admin\\TabTableSeeder' => $baseDir . '/src/database/seeds/TabTableSeeder.php',
    'Doitonlinemedia\\Admin\\TemplateTableSeeder' => $baseDir . '/src/database/seeds/TemplateTableSeeder.php',
    'Doitonlinemedia\\Admin\\Tests\\Application\\IsItRunningTest' => $baseDir . '/src/tests/application/IsItRunningTest.php',
    'Doitonlinemedia\\Admin\\Tests\\TestCase' => $baseDir . '/src/tests/TestCase.php',
    'Doitonlinemedia\\Admin\\UserTableSeeder' => $baseDir . '/src/database/seeds/UserTableSeeder.php',
);