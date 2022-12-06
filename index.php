<?php

require_once __DIR__ . '/kirby/bootstrap.php';

if (preg_match('~^/media/(.*)~', $_SERVER['REQUEST_URI'])) {
	header('Cache-Control: public, max-age=31536000');
}

if (preg_match('~^/assets/(.*)~', $_SERVER['REQUEST_URI'])) {
	header('Cache-Control: public, max-age=1800');
}

echo kirby()->render();
