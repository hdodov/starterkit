<?php

$GLOBALS['PRODUCTION'] = getenv('KIRBY_ENV') === 'production';

// Avoid incorrect software requirement error.
$_SERVER['SERVER_SOFTWARE'] = 'Apache/2.2.24';

if ($GLOBALS['PRODUCTION']) {
	require getenv('KIRBY_ROOT') . '/kirby/bootstrap.php';
} else {
	require __DIR__ . '/kirby/bootstrap.php';
}

$kirby = new Kirby();

echo $kirby->render();
