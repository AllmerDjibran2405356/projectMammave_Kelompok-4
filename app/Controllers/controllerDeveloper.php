<?php

namespace App\Controllers;

class controllerDeveloper extends BaseController{
    public function developerOptions(){
        return view('developer');
    }

    public function homepage(){
        return view('Pelanggan/viewHomepage');
    }

    public function pemesanan(){
        return view('Pelanggan/viewPemensanan');
    }

    public function registerAkun(){
        return view('Pelanggan/viewRegisterAkun');
    }

    public function loginAkun(){
        return view('Pelanggan/viewLoginAkun');
    }
}

?>