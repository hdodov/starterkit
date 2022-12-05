<?php

$GLOBALS['PRODUCTION'] = getenv('KIRBY_ENV') === 'production';

if ($GLOBALS['PRODUCTION']) {
	require getenv('KIRBY_ROOT') . '/kirby/bootstrap.php';
} else {
	require __DIR__ . '/kirby/bootstrap.php';
}

$kirby = new Kirby();

echo $kirby->render();
