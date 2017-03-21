<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \App\Controllers\UserController as UserController;

$app->group('/api', function() {

	/**
	 * Version 1 Group
	 */
	$this->group('/v1', function() {

		/**
		 * Users endpoints
		 */
		$this->get('/users', 'UserController:index');
		$this->get('/users/{id:[0-9]+}', 'UserController:userById');
		$this->get('/users/email/{email}', 'UserController:userByEmail');
		
	});

});