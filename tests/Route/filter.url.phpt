<?php

/**
 * Test: Nette\Routing\Route with FILTER_IN & FILTER_OUT
 */

declare(strict_types=1);

use Nette\Routing\Route;


require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Route.php';


$route = new Route('<presenter>', [
	'presenter' => [
		Route::FILTER_IN => function ($s) {
			return strrev($s);
		},
		Route::FILTER_OUT => function ($s) {
			return strrev($s);
		},
	],
]);

testRouteIn($route, '/abc/', [
	'presenter' => 'cba',
	'test' => 'testvalue',
], '/abc?test=testvalue');
