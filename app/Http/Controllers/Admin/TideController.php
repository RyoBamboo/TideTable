<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PrefectureRepository;
use App\Repositories\SpotRepository;
use App\Repositories\WeatherRepository;

class TideController extends Controller {

    protected $prefecture_gestion;
    protected $spot_gestion;
    protected $weather_gestion;


    public function __construct(PrefectureRepository $prefecture_gestion, SpotRepository $spot_gestion, WeatherRepository $weather_gestion)
    {
        $this->prefecture_gestion = $prefecture_gestion;
        $this->spot_gestion = $spot_gestion;
        $this->weather_gestion = $weather_gestion;
    }

    public function index() {

    }

    public function get() {
        $spots = $this->spot_gestion->all();
        $today = date('Y/m/d', time());

        foreach ($spots as $spot) {
            /*--------------------
             curlでAPIタタク
            *-------------------*/
            $url = 'http://www.e-tsuri.info/tide?p='. $spot->name .'&d='. $today;
            $xml = new \XMLReader;
            $xml->open($url,  null, LIBXML_NOBLANKS);
            $tide_info = array();
            while($xml->read()) {
                if($xml->nodeType == $xml::ELEMENT) {
                    echo $xml->localName. PHP_EOL;
                    switch($xml->localName) {
                        case 'port_name': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        case 'shiomei': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        case 'hinode': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        case 'hinoiri': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        case 'tsukinode': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        case 'tsukinoiri': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        case 'tide': {
                            $xml->read();
                            echo $xml->value;
                            break;
                        }
                        default: {
                            break;
                        }
                    }
                }
            }
            exit;
        }
    }
}