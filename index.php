<?php

$GLOBALS['PRODUCTION'] = getenv('KIRBY_ENV') === 'production';

if (!$GLOBALS['PRODUCTION']) {
	require __DIR__ . '/kirby/bootstrap.php';
} else {
	// Kirby is already loaded by the lambda runtime.
}

$kirby = new Kirby($options);

echo $kirby->render();
