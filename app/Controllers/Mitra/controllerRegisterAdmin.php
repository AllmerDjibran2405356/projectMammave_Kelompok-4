<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Mitra\akun_mitra_register;

class controllerRegisterAdmin extends BaseController{
    public function viewRegisterAdmin(){
        if(!session()->get('isLoggedInAdmin')){
            return redirect()->to('Mitra/controllerLoginAdmin')->with('error', 'Harap login terlebih dahulu');
        }
        return view('Mitra/viewRegisterAdmin');
    }

    public function registerAkunAdmin(){
        $model = new akun_mitra_register();

        $username = $this->request->getPost('Username');

        if($model->checkDuplicate($username)){
            return redirect()->back()->with('error', 'username sudah terdaftar');
        }

        if($this->request->getPost('Password_Admin') !== $this->request->getPost('Password_Confirm')){
            return redirect()->back()->with('error', 'Password tidak sama');
        }

        $data = [
            'Username'       => esc($this->request->getPost('Username')),
            'Password_Admin' => esc(password_hash($this->request->getPost('Password_Admin'), PASSWORD_DEFAULT))
        ];

        if($model->insert($data)){
            return redirect()->to('Mitra/viewHomepageManajemen')->with('success', 'Admin berhasil ditambah');
        }else{
            return redirect()->back()->with('error', 'Registrasi gagal');
        }
    }
}
?>