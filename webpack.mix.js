const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
   devtool: 'source-map',
   module: {
      rules: [
         {
            test: /\.scss/,
            enforce: 'pre',
            loader: 'import-glob-loader'
         }
      ]
   }
})
   .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

mix.browserSync({
   proxy: {
      target: 'dev.match'
   }
});
