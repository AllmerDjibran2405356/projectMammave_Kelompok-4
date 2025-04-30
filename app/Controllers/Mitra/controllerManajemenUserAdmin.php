<?php
namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Mitra\list_akun_mitra;

class controllerManajemenUserAdmin extends BaseController{
    public function viewManajemenUserAdmin(){
        $modelListAkun = new list_akun_mitra();

        $data = [
            'list_akun' => $modelListAkun->findAll()
        ];

        return view('Mitra/viewManajemenUserAdmin', $data);
    }
    public function deleteAkun($id){
        $modelListAkun = new list_akun_mitra();
        $modelListAkun->delete($id);

        return redirect()->to('Mitra/controllerManajemenUserAdmin')->with('success', 'Menu berhasil dihapus');
    }
}
?>