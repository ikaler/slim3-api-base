<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Models\UserModel as UserModel;

/**
 * User Controller class
 */
class UserController extends BaseController
{
    /**
     * index method returning all user
     * 
     * @param  Request $request
     * @param  Response $response
     * @return Response Json response
     */
    public function index(Request $request, Response $response)
    {
        $this->logger->info("Show all users");
        $userModel = new UserModel($this->container);
        $data = $userModel->fetchAll();

        return $response->withJson($data);
    }

    /**
     * This method returns user details from user id
     * 
     * @param  Request  $request
     * @param  Response $response
     * @return Response Json response
     */
    public function userById(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        
        $this->logger->info("Show user by id");
        $userModel = new UserModel($this->container);
        $data = $userModel->fetch($id);

        return $response->withJson($data);
    }

    /**
     * This methods return user data from email
     * 
     * @param  Request  $request
     * @param  Response $response
     * @return Response Json response
     */
    public function userByEmail(Request $request, Response $response) {
        $email = $request->getAttribute('email');
        
        $this->logger->info("Show user by email", array("email"=>$email));
        $userModel = new UserModel($this->container);
        $data = $userModel->fetchByEmail($email);

        return $response->withJson($data);
    }
}