<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PrefectureRepository;
use App\Repositories\SpotRepository;

class SpotController extends Controller {

    protected $prefecture_gestion;
    protected $spot_gestion;

    public function __construct(PrefectureRepository $prefecture_gestion, SpotRepository $spot_gestion)
    {
        $this->prefecture_gestion = $prefecture_gestion;
        $this->spot_gestion = $spot_gestion;
    }

    public function index()
    {
        $spots = $this->spot_gestion->all();
        $prefectures = $this->prefecture_gestion->all();

        return view('admin.spot.index')->with(compact('spots', 'prefectures'));
    }

    public function get()
    {
        /*--------------------
         curlでAPIタタク
        *-------------------*/
        $url = 'http://www.e-tsuri.info/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        if (preg_match_all('/<a href="#">(.+)<\/a>/u', $response, $m)) {
            foreach ($m[1] as $value) {
                if (strpos($value, '地方') !== false) {
                    $area = $value;
                    continue;
                }

                if (strpos($value, '県') !== false || strpos($value, '北海道') !== false) {
                    $data = array('name'=>$value, 'area'=>$area);
                    $this->prefecture_gestion->store($data);
                    continue;
                }

                $prefectur_id = $this->prefecture_gestion->getNewest()->id;
                $data = array('name'=>$value, 'prefecture_id'=>$prefectur_id);
                $this->spot_gestion->store($data);
            }
        }

    }

    public function delete()
    {

    }

    public function update()
    {

    }
}