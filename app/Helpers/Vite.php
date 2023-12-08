<?php

namespace App\Helpers;

class Vite
{
  static function assetDev($mainFile, $next = false)
  {
    $url = ' http://localhost:3000';
    if (file_exists(filename: public_path('hot'))) {
      $url = rtrim(file_get_contents(public_path("hot")));
    }


    $script = [
      '<script type="module" src="' . $url . '/@vite/client"></script>',
      '<script type="module" src="' . $url . '/' . $mainFile . '"></script>',

    ];

    return implode(' ', $script);
  }
}
