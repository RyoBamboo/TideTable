<?php namespace App\Repositories;

abstract class BaseRepository {

    protected $model;

    public function getNumber()
    {
    }

    public function getNewest() {
        return $this->model->orderby('id', 'desc')->first();
    }

    public function get($attributes = array()) {
        return $this->model->get($attributes);
    }

    public function destroy()
    {
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
}