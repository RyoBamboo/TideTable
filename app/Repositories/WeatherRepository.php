<?php namespace App\Repositories;

use App\Models\Weather;

class WeatherRepository extends BaseRepository {

    public function __construct(Weather $weather) {
        $this->model = $weather;
    }

    public function store($data) {
        $prefecture = new $this->model;

        $prefecture->prefecture_id = $data['prefecture_id'];
        $prefecture->temp = $data['temp'];
        $prefecture->date = $data['date'];

        return $prefecture->save();
    }
}