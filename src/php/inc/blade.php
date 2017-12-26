<?php
use duncan3dc\Laravel\Blade;
use duncan3dc\Laravel\BladeInstance;

/**
 * Either build and return a BladeInstance, or, if given a template
 * name to render, return the HTML built from the template name.
 * @param  string $template Optionally, a template to render
 * @param  array  $data Optionally, data to use in rendering
 * @return mixed Either 
 */
function blade($template = '', $data = []) 
{
  static $blade;

  if (empty($blade)) {

    $blade = new BladeInstance(get_template_directory(), wp_upload_dir()['basedir'].'/.blade-cache');

    Blade::setInstance($blade);

    do_action('blade_init', $blade);

  }

  if (!empty($template)) {

    return $blade->render($template, $data);

  } else {

    return $blade;

  }
}

/**
 * This bit was tkane straight out of Sage, but their code is in two places for some reason
 * Basically what this does is it supplements the WordPress template hiearchy
 * with a bunch of .blade.php alternatives such that if a .blade.php file is found, it
 * supercedes the normal .php file in importance.
 * @see https://github.com/roots/sage/blob/master/app/setup.php#L102
 * @see https://github.com/roots/sage/blob/master/app/filters.php
 */
collect([
  'index', 
  '404', 
  'archive', 
  'author', 
  'category', 
  'tag', 
  'taxonomy', 
  'date', 
  'home',
  'frontpage', 
  'page', 
  'paged', 
  'search', 
  'single', 
  'singular', 
  'attachment',
])->map(function ($type) {

  add_filter("{$type}_template_hierarchy", function($templates) {
    
    $paths = [ get_template_directory() ];

    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)->map(function ($template) use ($paths_pattern) {

      /** Remove .blade.php/.blade/.php from template names */
      $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

      /** Remove partial $paths from the beginning of template names */
      if (strpos($template, '/')) {
        $template = preg_replace($paths_pattern, '', $template);
      }

      return $template;

    })->flatMap(function ($template) use ($paths) {

      return collect($paths)->flatMap(function($path) use ($template) {
        return [
            "{$path}/{$template}.blade.php",
            "{$path}/{$template}.php",
            "{$template}.blade.php",
            "{$template}.php",
        ];
      });

    })->filter()
      ->unique()
      ->all();

  });

});



add_filter('template_include', function($phpPath) {

  global $wp_query;

  if (preg_match('#/([^/]+?)((.blade)?.php)$#i', $phpPath, $matches)) {

    $templateName = $matches[1];

    $bladePath = $phpPath;

    if (empty($matches[3])) {

      $bladePath = preg_replace('#(.php)$#i', '.blade.php', $phpPath);

    }

    if (file_exists($bladePath)) {

      echo blade($templateName, [ 'foo' => 'bar' ]);

      return get_stylesheet_directory() . '/src/php/templates/empty.php';

    }

  } 
  
  return $phpPath;

}, PHP_INT_MAX, 10);
