<?php namespace App\Http\Controllers;

use App\Repositories\SpotRepository;

class TideController extends Controller {

    protected $spot_gestion;

    public function __construct(SpotRepository $spot_gestion)
    {
        $this->spot_gestion = $spot_gestion;
    }

    public function index($spot_id)
    {
        $spot = $this->spot_gestion->getById($spot_id);
        return view('tide.index')->with(compact('spot'));
    }
}