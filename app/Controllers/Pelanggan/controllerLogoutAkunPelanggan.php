<?php
namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;

class controllerLogoutAkunPelanggan extends BaseController{
    public function logOut(){
        session()->destroy();
        return redirect()->to('Pelanggan/controllerHomepage')->with('success', 'Akun Telah Logout');
    }
}