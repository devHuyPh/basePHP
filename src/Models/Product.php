<?php

namespace Admin\Base\Models;

use Admin\Base\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function all() {
        return $this->queryBuilder
        ->select(
            'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail', 'p.price_regular','p.price_sale','p.created_at', 'p.updated_at',
            'c.name as c_name'
        )
        ->from($this->tableName, 'p')
        ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
        ->orderBy('p.id', 'desc')
        ->fetchAllAssociative();
    }

    public function paginate($page = 1, $perPage = 8)
    {
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
        ->select(
            'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail','p.price_regular','p.price_sale', 'p.created_at', 'p.updated_at',
            'c.name as c_name'
        )
        ->from($this->tableName, 'p')
        ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->orderBy('p.id', 'desc')
        ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function paginateHome($page = 1, $perPage = 4)
    {
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);  

        $offset = $perPage * ($page -1);

        $data = $queryBuilder
        ->select(
            'p.id', 'p.name', 'p.category_id', 'p.price_regular', 'p.price_sale',  'p.img_thumbnail', 'p.created_at', 'p.updated_at',
            'c.name as c_name',
        )
        ->from($this->tableName, 'p')
        ->innerJoin('p','categories','c','c.id = p.category_id')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->orderBy('p.id', 'desc')
        ->fetchAllAssociative();

        return [$data , $totalPage];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select(
                'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail', 'p.price_regular','p.price_sale','p.created_at', 'p.updated_at',
                'p.overview', 'p.content',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }
    public function countByCategory()
    {
        return $this->queryBuilder
            ->select('category_id, COUNT(*) as total')
            ->from($this->tableName)
            ->groupBy('category_id')
            ->fetchAllAssociative();
    }
}