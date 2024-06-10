<?php

namespace Admin\Base\Models;

use Admin\Base\Commons\Model;

class OrderDetail extends Model 
{
    protected string $tableName = 'order_details';

    public function findByOrderID($orderID)
    {
        return $this->queryBuilder
            ->select('od.*,p.name as product_name')
            ->from($this->tableName, 'od')
            ->innerJoin('od','products','p','od.product_id=p.id')
            ->where('od.order_id = ?')
            ->setParameter(0, $orderID)
            ->fetchAllAssociative();
    }

    public function adminfindByOrderID($orderID)
    {
        return $this->queryBuilder
        ->select('od.*,p.name as product_name')
        ->from($this->tableName, 'od')
        ->innerJoin('od','products','p','od.product_id=p.id')
        ->where('od.order_id = ?')
        ->setParameter(0, $orderID)
        ->fetchAllAssociative();
    }
}