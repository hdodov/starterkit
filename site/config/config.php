<?php

use Kirby\Cms\Response;
use Kirby\Filesystem\F;

$options = [
    'debug' => true,
    'panel' => [
        'install' => true
    ],
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result, $final) {
            $filePath = kirby()->root('index') . '/' . $path;

            if (F::exists($filePath)) {
                return Response::file($filePath);
            }
        }
    ]
];

// if ($GLOBALS['PRODUCTION']) {
//     $options['url'] = getenv('SERVER_URL');
// }

return $options;
