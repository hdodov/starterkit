<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

use Kirby\Filesystem\F;

/**
 * Serve a file from the filesystem.
 * @see https://stackoverflow.com/a/7591130
 */
function serve_file($path)
{
    $file = @fopen($path, 'rb');

    if (is_resource($file) !== true) {
        return false;
    }

    $size = sprintf('%u', filesize($path));
    $range = [0, $size - 1];
    $extension = F::extension($path);

    switch ($extension) {
        case 'css':
            $type = 'text/css';
            break;
        case 'js':
            $type = 'application/javascript';
            break;
        case 'jpg':
            $type = 'image/jpeg';
            break;
        case 'png':
            $type = 'image/png';
            break;
        default:
            $type = 'text/plain';
    }

    header('Cache-Control: public, max-age=30');
    header('Content-Type: ' . $type);
    header('Content-Length: ' . sprintf('%u', $range[1] - $range[0] + 1));

    while ((feof($file) !== true) && (connection_status() === CONNECTION_NORMAL)) {
        echo fread($file, round(1024 * 1024));
        flush();
    }

    fclose($file);

    exit();
}

$options = [
    'debug' => true,
    'hooks' => [
        'route:after' => function ($route, $path, $method, $result, $final) {
            $path = kirby()->roots()->index() . '/' . $path;

            if (F::exists($path)) {
                return serve_file($path);
            }
        }
    ]
];

if ($GLOBALS['PRODUCTION']) {
    $options['url'] = getenv('SERVER_URL');
}

return $options;
