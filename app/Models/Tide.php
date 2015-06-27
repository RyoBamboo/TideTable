<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tide extends Model {

    protected $table = 'tides';


    // createメソッド時に入力を禁止するカラム
    protected $guarded = array('id');

}
