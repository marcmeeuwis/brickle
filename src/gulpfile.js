/* ADMIN PACKAGE GULPING - DEVELOPMENT PROJECT ONLY
 *
 * COPY GENERATED FILES IN PUBLIC FOLDER ON PACKAGE DEPLOYMENT
 *
 */

var admin = require('laravel-elixir');

admin.config.assetsPath = 'packages/doitonlinemedia/admin/src/resources/assets/';

admin(function(mix) {
    mix.sass([
        'defaults/bootstrap.min.scss',
        'defaults/flat-ui.min.scss',
        'defaults/master.scss'
    ], 'public/vendor/doitonlinemedia/admin/css/all.css');

    mix.scripts([
        'defaults/jquery-2.2.1.min.js',
        'defaults/bootstrap.min.js',
        'defaults/flat-ui.min.js',
        'defaults/main.js',
    ], 'public/vendor/doitonlinemedia/admin/js/all.js');
});





// ==== FRONTEND GULPING ==== //
var elixir = require('laravel-elixir');

elixir.config.assetsPath = 'resources/assets/';

elixir(function(mix) {
    mix.sass([
        // frontend stuff
    ], 'public/css/all.css');

    mix.scripts([
        // frontend stuff
    ], 'public/js/all.js');
});