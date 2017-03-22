<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models;

use \Interop\Container\ContainerInterface as ContainerInterface;

/**
 * Base model class
 */
class BaseModel
{
    protected $container;

    /**
     * Base Model receives container instance
     * 
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * PHP magic method to return object property
     * 
     * @param  any $property
     * @return any 
     */
    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}