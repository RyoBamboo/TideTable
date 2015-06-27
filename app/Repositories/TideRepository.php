<?php namespace App\Repositories;

use App\Models\Tide;

class TideRepository extends BaseRepository {

    public function __construct(Tide $tide) {
        $this->model = $tide;
    }

}