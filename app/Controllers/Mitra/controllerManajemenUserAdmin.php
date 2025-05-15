<?php
namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Mitra\list_akun_mitra;

class controllerManajemenUserAdmin extends BaseController{
    public function viewManajemenUserAdmin(){
        if(!session()->get('isLoggedInAdmin')){
            return redirect()->to('Mitra/controllerLoginAdmin')->with('error', 'Harap login terlebih dahulu');
        }
        $modelListAkun = new list_akun_mitra();
        $currentAccount = session()->get('Username');

        $list_akun = $modelListAkun->select('akun_admin.*')
                                   ->where('akun_admin.Username !=', $currentAccount)
                                   ->findAll();

        $data = [
            'list_akun' => $list_akun
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