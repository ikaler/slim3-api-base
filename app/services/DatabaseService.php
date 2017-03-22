<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Services;

use \Interop\Container\ContainerInterface as ContainerInterface;

/**
 * Database connection class
 */
class DatabaseService
{
    protected $container;

    protected static $conn;

    // constructor receives container instance
    protected function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        try {
            $databaseString = "mysql:host=" . $this->settings["database"]["host"] . ";dbname=" . $this->settings["database"]["data"];

            self::$conn = new \PDO($databaseString, $this->settings["database"]["user"], $this->settings["database"]["pass"]);
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            /* (DEBUG_MODE) {
                echo "DB connection failed Error Code:" . $e->getCode() . ". Error: " . $e->getMessage();
                var_dump($e);
                die();
            } else {
                echo "We are having some issues at our end. Please try again later.";
                log_error(Monolog\Logger::CRITICAL, $e->getMessage(), $e->getCode(), array('exception' => $e));
                die();
            }*/
            echo "We are having some issues at our end. Please try again later.";
            return FALSE;
        }
    }

    public function __get($property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
    
    /**
     * Static instance method
     * 
     * @param  ContainerInterface $container
     * @return self
     */
    public static function getConnection(ContainerInterface $container) {
        //Guarantees single instance
        if (!self::$conn) {
            //new connection
            new DatabaseService($container);
        }
        
        //return connection
        return self::$conn;
    }
}