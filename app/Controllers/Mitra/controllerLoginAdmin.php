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
        $passwordAdmin = $this->request->getPost('Password_Admin');

        $akun = $model->getAkun($username);

        if($akun && password_verify($passwordAdmin, $akun['Password_Admin'])){
            session()->set('isLoggedInAdmin', true);
            session()->set('Username', $akun['Username']);
            session()->set('ID_Admin', $akun['ID_Admin']);
            return redirect()->to('Mitra/viewHomepageManajemen');
        }else{
            return redirect()->to('/Mitra/controllerLoginAdmin')->with('error', 'Username/Password Salah');
        }
    }
}