var gulp = require('gulp');
var shell = require('gulp-shell');

var elixir = require('laravel-elixir');


var Task = elixir.Task;
elixir.extend('langjs', function(path) {
    new Task('langjs', function() {
        gulp.src('').pipe(shell('php artisan lang:js ' + (path || 'public/assets/js/messages.js')));
    });
});

elixir(function(mix) {
    mix.langjs();
});


elixir.config.sourcemaps = false;


//INDEX

//hace Mix por el asterisco y genera un archivo
/*
elixir(function(mix) {
    mix.less('*.less')
    .version('public/css/style.css');
});
*/

elixir(function(mix) {
    mix.less('index/theme.less')
    .version('public/css/theme.css');
    mix.copy('public/css/theme.css', 'public/assets/css/index/theme.css');
});

/*
elixir(function(mix) {
    mix.coffee('*.coffee')
    .version('public/js/coffe.js');
});
*/

elixir(function(mix) {
    mix.coffee('index/index.coffee')
    .version('public/js/index.js');
    mix.copy('public/js/index.js', 'public/assets/js/index/index.js');
});

elixir(function(mix) {
    mix.coffee('index/controllers.coffee')
    .version('public/js/controllers.js');
    mix.copy('public/js/controllers.js', 'public/assets/js/index/angular/controllers.js');
});

elixir(function(mix) {
    mix.coffee('index/factory.coffee')
    .version('public/js/factory.js');
    mix.copy('public/js/factory.js', 'public/assets/js/index/angular/factory.js');
});



//System

//hace Mix por el asterisco y genera un archivo
/*
elixir(function(mix) {
    mix.less('*.less')
    .version('public/css/style.css');
});
*/

elixir(function(mix) {
    mix.less('system/theme.less')
    .version('public/css/theme.css');
    mix.copy('public/css/theme.css', 'public/assets/css/system/theme.css');
});

/*
elixir(function(mix) {
    mix.coffee('*.coffee')
    .version('public/js/coffe.js');
});
*/

elixir(function(mix) {
    mix.coffee('system/index.coffee')
    .version('public/js/index.js');
    mix.copy('public/js/index.js', 'public/assets/js/system/index.js');
});

elixir(function(mix) {
    mix.coffee('system/controllers.coffee')
    .version('public/js/controllers.js');
    mix.copy('public/js/controllers.js', 'public/assets/js/system/angular/controllers.js');
});

elixir(function(mix) {
    mix.coffee('system/factory.coffee')
    .version('public/js/factory.js');
    mix.copy('public/js/factory.js', 'public/assets/js/system/angular/factory.js');
});