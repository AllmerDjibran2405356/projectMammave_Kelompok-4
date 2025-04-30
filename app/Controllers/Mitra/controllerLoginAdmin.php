<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Mitra\akun_mitra_login;

class controllerLoginAdmin extends BaseController{
    public function viewLoginAdmin(){
        return view('Mitra/viewLoginAdmin');
    }

    public function loginAkunAdmin(){
        $model = new akun_mitra_login();

        $username = $this->request->getPost('Username');
        $password = $this->request->getPost('Password_Admin');

        $akun = $model->getAkun($username);

        if($akun && password_verify($password, $akun['Password_Admin'])){
            session()->set('isLoggedInAdmin', true);
            session()->set('Username', $akun['Username']);
            session()->set('ID_Admin', $akun['ID_Admin']);
            return redirect()->to('Mitra/controllerHomepageManajemen');
        }else{
            return redirect()->to('Mitra/controllerLoginAdmin')->with('error', 'Username/Password Salah');
        }
    }
}