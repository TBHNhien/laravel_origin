
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 Đoạn mã này cho Laravel Mix, một API để định nghĩa các bước xây dựng Webpack cho các ứng dụng Laravel.
  Nó cấu hình Mix để biên dịch file JavaScript và SASS thành file JS và CSS trong thư mục public
 */
  const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/scss/app.scss', 'public/css', [
     //
   ]);

/*
mix runs on webpack , so we need install :
-nodejs
*/