<?php namespace App\Repositories;

use App\Models\Prefecture;

class PrefectureRepository extends BaseRepository {

    public function __construct(Prefecture $prefecture)
    {
        $this->model = $prefecture;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function store($data)
    {
        $prefecture = new $this->model;
        $prefecture->name = $data['name'];
        $prefecture->area = $data['area'];

        return $prefecture->save();
    }

}