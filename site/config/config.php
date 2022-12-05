<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

use Kirby\Cms\Response;
use Kirby\Filesystem\F;

$options = [
    'debug' => true,
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result, $final) {
            $filePath = kirby()->root('index') . '/' . $path;

            if (F::exists($filePath)) {
                return Response::file($filePath);
            }
        }
    ]
];

if ($GLOBALS['PRODUCTION']) {
    $options['url'] = getenv('SERVER_URL');
}

return $options;
