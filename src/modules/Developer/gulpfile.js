var elixir = require('laravel-elixir');

elixir.config.assetsPath = 'Assets/';

elixir(function(mix) {
    mix.sass([
        'developer.scss'
    ], '../../public/modules/developer/css/developer.css');

    mix.scripts([

    ], '../../public/modules/developer/css/developer.js');
});