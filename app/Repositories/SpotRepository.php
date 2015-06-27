<?php namespace App\Repositories;

use App\Models\Spot;

class SpotRepository extends BaseRepository {

    public function __construct(Spot $spots)
    {
        $this->model = $spots;
    }

    public function store($data)
    {
        $spot = new $this->model;
        $spot->name = $data['name'];
        $spot->prefecture_id = $data['prefecture_id'];

        $spot->save();
    }

    public function all() {
        return $this->model->all();
    }
}