<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use App\Models\Weather;

class WeatherController extends Controller {

    protected $prefecture_gestion;
    protected $weather_gestion;

    public function __construct(Prefecture $prefecture_gestion, Weather $weather_gestion)
    {
        $this->prefecture_gestion = $prefecture_gestion;
        $this->weather_gestion = $weather_gestion;
    }

    public function index()
    {

    }

    public function get()
    {
        $prefectures = $this->prefecture_gestion->all();
        foreach($prefectures as $prefecture) {
            /*--------------------
             curlでAPIタタク
            *-------------------*/
            $url = 'http://api.openweathermap.org/data/2.5/weather?q='. $prefecture->name;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
            $response = (json_decode($response));
            if (!isset($response->message)) {
                $data = array(
                    'prefecture_id'=>$prefecture->id,
                    'date'=>1,
                    'temp'=>'test'
                );
                $this->weather_gestion->store($data);
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