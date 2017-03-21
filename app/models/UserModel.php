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

class UserModel extends BaseModel
{

    public function fetchAll()
    {
        $res = array();
    
        if ($this->dbConn) {
            try {
                $sql = 'SELECT * FROM users';

                $stmt = $this->dbConn->prepare($sql);
                
                $stmt->execute();
                $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                $this->logger->error(__CLASS__ . "->" . __FUNCTION__ . " Query: ". $stmt->queryString, array('exception' => $e));
            }
        }
        
        return $res;
    }

    public function fetch($userId)
    {
        $res = array();
    
        if ($this->dbConn) {
            try {
                $sql = 'SELECT * FROM users WHERE id=:user_id';

                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
                
                $stmt->execute();
                $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                $this->logger->error(__CLASS__ . "->" . __FUNCTION__ . " Query: ". $stmt->queryString, array('exception' => $e));
            }
        }
        
        return $res;
    }

    public function fetchByEmail($email)
    {
        $res = array();
    
        if ($this->dbConn) {
            try {
                $sql = 'SELECT * FROM users WHERE email=:email';

                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
                
                $stmt->execute();
                $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                $this->logger->error(__CLASS__ . "->" . __FUNCTION__ . " Query: ". $stmt->queryString, array('exception' => $e));
            }
        }
        
        return $res;
    }
}