<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class controllerHomepageManajemen extends BaseController{
    public function viewHomepageManajemen(){
        if(!session()->get('isLoggedInAdmin')){
            return redirect()->to('Mitra/controllerLoginAdmin')->with('error', 'Harap login terlebih dahulu');
        }
        return view('Mitra/viewHomepageManajemen');
    }
}
?>