<?php
namespace FatPanda\WordPress;

use Illuminate\Support\Str;

class Ship {

  private static $instance;

  private static $basePath;

  static function postCreateProjectCmd($event)
  {
    $args = $event->getArguments();

    $useDefaults = !empty($args[0]) && $args[0] === 'defaults';

    return self::getInstance()->setupLocalProject($useDefaults);
  }

  private function __construct() {}

  static function getInstance()
  {
    return self::$instance ? self::$instance : ( self::$instance = new self() );
  }

  function setupLocalProject($useDefaults = false)
  {
    $meta = [
      'Theme Name' => 'Ship',
      'Theme URI' => 'https://github.com/collegeman/ship',
      'Author' => 'Fat Panda, LLC',
      'Author URI' => 'https://www.withfatpanda.com',
      'Description' => 'A WordPress Theme Framework based on UnderStrap (Underscores + Bootstrap)',
      'Version' => '1.0.2',
      'License' => 'GPL-2.0',
      'License URI' => 'http://www.gnu.org/licenses/gpl-2.0.html',
      'Text Domain' => 'understrap',
      'Tags' => 'one-column, custom-menu, featured-images, theme-options, translation-ready',
    ];

    $finalMeta = [];

    $styleStub = $this->readLocalFile('src/php/FatPanda/WordPress/style.stub');

    foreach($meta as $field => $default) {
      $finalMeta[] = "{$field}: " . ($value = $useDefaults ? $default : $this->prompt($field, $default));
      $meta[$field] = $value;
    }

    $style = str_replace('{{meta}}', implode("\n", $finalMeta), $styleStub);

    $this->writeLocalFile('style.css', $style);

    $composer = (array) json_decode($this->readLocalFile('src/php/FatPanda/WordPress/composer.stub'));

    $composerFields = [
      'name' => 'Package Name',
      'type' => 'Project Type',
    ];

    $composer['version'] = $meta['Version'];

    if (!$useDefaults) {
      $composer['scripts'] = (object) [];

      foreach($composerFields as $field => $label) {
        $composer[$field] = $this->prompt($label, $composer[$field]);
      }
    }

    $this->writeLocalFile('composer.json', str_replace('\/', '/', json_encode($composer, JSON_PRETTY_PRINT)));

    $package = (array) json_decode($this->readLocalFile('src/php/FatPanda/WordPress/package.stub'));

    $package['version'] = $meta['Version'];

    if (!$useDefaults) {
      $package['name'] = Str::slug($meta['Theme Name']);
      $package['bugs'] = (object) [];
      $package['homepage'] = $meta['Theme URI'];
      $package['description'] = $meta['Description'];
      $package['author'] = $meta['Author'];
      $package['license'] = $meta['License'];
    }

    $this->writeLocalFile('package.json', str_replace('\/', '/', json_encode($package, JSON_PRETTY_PRINT)));
  }

  static function getBasePath($filePath = '')
  {
    $basePath = self::$basePath ? self::$basePath : ( self::$basePath = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..') );

    return $filePath ? $basePath.DIRECTORY_SEPARATOR.ltrim($filePath, DIRECTORY_SEPARATOR) : $basePath;
  }

  function readLocalFile($filePath)
  {
    return file_get_contents(self::getBasePath($filePath));
  }

  function writeLocalFile($filePath, $data)
  {
    file_put_contents(self::getBasePath($filePath), $data);
  }

  function prompt($question, $default = null)
  {
    $prompt = $question;

    if ($default) {
      $prompt .= ' [' . $default . ']';
    }

    $prompt .= ': ';

    echo $prompt;

    $handle = fopen('php://stdin', 'r');

    $in = trim(fgets($handle), "\n");

    fclose($handle);

    return $in ?: $default;
  }

}
