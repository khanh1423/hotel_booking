<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $view   = 'administrator.modules.dashboard.';
    public function index(){
        return view($this->view . 'index');
    }
}
