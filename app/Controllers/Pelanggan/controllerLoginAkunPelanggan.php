<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Pelanggan\akun_pelanggan_login;

class controllerLoginAkunPelanggan extends BaseController{
    public function viewLogin(){
        return view('Pelanggan/viewLoginAkun');
    }

    public function loginAkun(){
        $model = new akun_pelanggan_login();

        $email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password_User');

        $akun = $model->getAkun($email);

        if($akun && password_verify($password, $akun['Password_User'])){
            session()->set('isLoggedIn', true);
            session()->set('Email', $akun['Email']);
            session()->set('ID_User', $akun['ID_User']);
            return redirect()->to('Pelanggan/controllerHomepage');
        }else{
            return redirect()->to('Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Cek Email/Password');
        }
    }
}
?>