<?php

namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Pelanggan\akun_pelanggan_login;

class controllerEditAkun extends BaseController{
    public function viewEditAkun(){
        return view('Pelanggan/viewEditAkun');
    }

    public function editAkun(){
        $model = new akun_pelanggan_login();

        $id_user = session()->get('ID_User');

        $dataLama = $model->find($id_user);

        $dataInput = [
            'Nama_Depan'    => esc($this->request->getPost('Nama_Depan')),
            'Nama_Belakang' => esc($this->request->getPost('Nama_Belakang')),
            'Alamat'        => esc($this->request->getPost('Alamat')),
            'Tanggal_Lahir' => esc($this->request->getPost('Tanggal_Lahir')),
            'Nomor_Telepon' => esc($this->request->getPost('Nomor_Telepon')),
            'Email'         => esc($this->request->getPost('Email'))
        ];

        $dataUpdate = [];
        foreach($dataInput as $key => $value){
            if($value !== $dataLama[$key]){
                $dataUpdate[$key] = $value;
            }
        }

        if(!empty($dataUpdate)){
            $model->update($id_user, $dataUpdate);
            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        }else{
            return redirect()->back()->with('info', 'Tidak ada perubahan data');
        }
    }
}
?>