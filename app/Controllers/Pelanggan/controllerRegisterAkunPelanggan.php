<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Pelanggan\akun_pelanggan_register;

class controllerRegisterAkunPelanggan extends BaseController{
    public function viewRegister(){
        return view('Pelanggan/viewRegisterAkun');
    }

    public function registerAkun(){
        $model = new akun_pelanggan_register();

        $email = $this->request->getPost('Email');
        $nomorTelepon = $this->request->getPost('Nomor_Telepon');

        if($model->checkDuplicate($email, $nomorTelepon)){
            return redirect()->back()->with('error', 'Email atau nomor telepon sudah terdaftar');
        }

        if ($this->request->getPost('Password_User') !== $this->request->getPost('Password_Confirm')) {
            return redirect()->back()->with('error', 'Password tidak sama');
        }

        $data = [
            'Nama_Depan'    => esc($this->request->getPost('Nama_Depan')),
            'Nama_Belakang' => esc($this->request->getPost('Nama_Belakang')),
            'Alamat'        => esc($this->request->getPost('Alamat')),
            'Tanggal_Lahir' => esc($this->request->getPost('Tanggal_Lahir')),
            'Nomor_Telepon' => esc($this->request->getPost('Nomor_Telepon')),
            'Email'         => esc($this->request->getPost('Email')),
            'Password_User' => esc(password_hash($this->request->getPost('Password_User'), PASSWORD_DEFAULT))
        ];

        if($model->insert($data)){
            return redirect()->to('Pelanggan/controllerLoginAkunPelanggan')->with('success', 'Akun berhasil dibuat');
        }else{
            return redirect()->back()->with('error', 'Registrasi gagal');
        }
    }
}
?>