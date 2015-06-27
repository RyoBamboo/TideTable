<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller {

    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.home');
    }
}