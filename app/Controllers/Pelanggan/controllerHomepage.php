<?php
namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;

class controllerHomepage extends BaseController{
    public function viewHomepage(){
        return view('Pelanggan/viewHomepage');
    }
}