<?php
/**
 * Asset loading functionality.
 */

if ( ! function_exists('asset') ) {
  /**
   * Load an asset; look to the manifest for any versioning.
   * @param String $path The relative path of the asset (relative to the public assets path)
   * @param String $manifestName The name of the manifest file; defaults to "mix-manifest.json"
   * @param String $publicPath The relative path to the public file space
   * @return The URL to the asset
   */
  function asset($path, $manifestName = 'mix-manifest.json', $publicPath = 'assets/') {

    static $manifest;

    if (is_null($manifest)) {
      $manifest = [];
      $manifestPath = get_stylesheet_directory() . DIRECTORY_SEPARATOR . trim($publicPath, '/') . DIRECTORY_SEPARATOR . ltrim($manifestName, '/');
      if (file_exists($manifestPath)) {
        $manifestContent = file_get_contents($manifestPath);
        $manifest = (array) json_decode($manifestContent);
      }
    }

    $basePath = get_stylesheet_directory_uri() . '/' . ltrim($publicPath, '/');
    $name = '/' . ltrim($path, '/');

    if (!empty($manifest[$name])) {
      $path = rtrim($basePath, '/') . $manifest[$name];
    } else {
      $path = $basePath . ltrim($path, '/');
    }

    return $path;

  }

}