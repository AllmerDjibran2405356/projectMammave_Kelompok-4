<?php
namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class controllerLogoutAdmin extends BaseController{
    public function logOut(){
        session()->destroy();
        return redirect()->to('Mitra/controllerLoginAdmin')->with('success', 'Akun Telah Logout');
    }
}