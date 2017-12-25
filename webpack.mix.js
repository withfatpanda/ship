let mix = require('laravel-mix');
let del = require('del');
let gulp = require('gulp');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('src/js/theme.js', 'assets/js')
  .js('src/js/customizer.js', 'assets/js')
  .sass('src/scss/theme.scss', 'assets/css')
  .sass('src/scss/custom-editor-style.scss', 'assets/css')
  .sass('src/scss/wpcom.scss', 'assets/css')
  .copy('node_modules/font-awesome/fonts', 'assets/fonts')
  .copy('src/img', 'assets/img')
  .setPublicPath('assets/')
  .options({
    processCssUrls: false
  })
  .version()
  .sourceMaps();

/*
 |--------------------------------------------------------------------------
 | Package theme for distribution
 |--------------------------------------------------------------------------
 |
 */

if (process.env.MIX_BUILD_DIST) {
  del([
    'dist/**/*'
  ]).then(function() {
    gulp.src([
      '**/*',
      '!node_modules',
      '!node_modules/**',
      '!src/js',
      '!src/js/**',
      '!src/scss',
      '!src/scss/**',
      '!src/img',
      '!src/img/**',
      '!dist',
      '!dist/**',
      '!composer.json',
      '!composer.lock',
      '!dist-product',
      '!dist-product/**',
      '!readme.txt',
      '!npm-debug.log',
      '!README.md',
      '!package.json',
      '!gulpfile.js',
      '!CHANGELOG.md',
      '!.travis.yml',
      '!jshintignore', 
      '!codesniffer.ruleset.xml',
      '!webpack.mix.js',
      '!yarn.lock', 
      '*'
    ]).pipe(gulp.dest('dist/'));
  });
}

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.ts(src, output); <-- Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.dev');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
