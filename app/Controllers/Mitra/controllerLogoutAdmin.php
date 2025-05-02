<?php
namespace App\Controllers\Mitra;

use App\Controllers\BaseController;

class controllerLogoutAdmin extends BaseController{
    public function logOut(){
        session()->remove('isLoggedInAdmin', 'Username', 'ID_Admin');
        return redirect()->to('Mitra/controllerLoginAdmin')->with('success', 'Akun Telah Logout');
    }
}