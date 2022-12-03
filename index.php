<?php

require __DIR__ . '/kirby/bootstrap.php';

$kirby = new Kirby([
	'roots' => [
		'accounts' => '/tmp/accounts',
		'cache' => '/tmp/cache',
		'sessions' => '/tmp/sessions',
		'media' => '/tmp/media'
	]
]);

echo $kirby->render();
