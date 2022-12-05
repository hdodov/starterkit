<?php

$GLOBALS['PRODUCTION'] = getenv('KIRBY_ENV') === 'production';

// Avoid incorrect software requirement error.
$_SERVER['SERVER_SOFTWARE'] = 'nginx';

if (!$GLOBALS['PRODUCTION']) {
	require __DIR__ . '/kirby/bootstrap.php';
} else {
	// Kirby is already loaded by the lambda runtime.
}

$kirby = new Kirby($options);

echo $kirby->render();
