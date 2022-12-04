<?php

$GLOBALS['PRODUCTION'] = getenv('KIRBY_ENV') === 'production';

require __DIR__ . '/kirby/bootstrap.php';

$options = [];

if ($GLOBALS['PRODUCTION']) {
	$options = [
		'roots' => [
			'accounts' => '/tmp/accounts',
			'cache' => '/tmp/cache',
			'sessions' => '/tmp/sessions',
			'media' => '/tmp/media'
		]
	];
}

$kirby = new Kirby($options);

echo $kirby->render();
