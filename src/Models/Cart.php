<?php

namespace Admin\Base\Models;

use Admin\Base\Commons\Model;

class Cart extends Model 
{
    protected string $tableName = 'carts';


    public function findByUserID($userID){
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id = ?')
            ->setParameter(0, $userID)
            ->fetchAssociative();
    }
    public function deleteByCartID($cartID) {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $cartID)
            ->executeQuery();
    }
    
}