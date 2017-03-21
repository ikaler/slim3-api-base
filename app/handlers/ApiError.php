<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Handlers;
 
use Psr\Http\Message\ ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Monolog\Logger;
 
final class ApiError extends \Slim\Handlers\Error
{
    protected $logger;
 
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
 
    public function __invoke(Request $request, Response $response, \Exception $exception)
    {
        // Log the message
        $this->logger->error($exception->getMessage());
 
        // create a JSON error string for the Response body
        $body = json_encode([
            'error' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    
        return $response
                ->withStatus(500)
                ->withHeader('Content-type', 'application/json')
                ->withBody(new Body(fopen('php://temp', 'r+')))
                ->write($body);
    }
}