<?php namespace NewsAggregator\Core\Repositories;


interface RepositoryInterface
{

    public function getById($id);

    public function save($model);

    public function getAll();

    public function create($data);

}