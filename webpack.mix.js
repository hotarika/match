const mix = require('laravel-mix');
const StylelintPlugin = require('stylelint-webpack-plugin');

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
            test: /\.(js|vue)$/,
            enforce: 'pre', // ES5に変換する前にコード検証を行う
            exclude: /node_modules/,
            loader: 'eslint-loader',
            options: {
               fix: true // 一部のエラーを自動修正する
            }
         },
         {
            test: /\.scss$/,
            enforce: 'pre',
            loader: 'import-glob-loader' // scssでglob使用
         }
      ]
   },
   plugins: [
      // stylelintの適用
      new StylelintPlugin({
         configFile: path.resolve(__dirname, '.stylelintrc.js'),
         syntax: 'scss',
         fix: true
      })
   ]
})
   .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sourceMaps();

mix.options({
   postCss: [require('autoprefixer')],
   purifyCss: true, // 未使用のCSSセレクタを取り除く
   terser: {
      extractComments: false, // .LICENSE.txtのようなファイル出力なし
      terserOptions: {
         compress: {
            drop_console: true // console.logを削除
         }
      }
   }
});

// 自動リロード
mix.browserSync({
   proxy: {
      target: 'dev.match'
   },
   open: false
});
