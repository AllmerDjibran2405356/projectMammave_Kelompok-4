<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Database\menu_list;
use App\Models\Database\menu_kategori;

class controllerManajemenMenu extends BaseController{
    public function viewManajemenMenu(){
        if(!session()->get('isLoggedInAdmin')){
            return redirect()->to('Mitra/controllerLoginAdmin')->with('error', 'Harap login terlebih dahulu');
        }
        $menuModel = new menu_list();
        $kategoriModel = new menu_kategori();

        $menu_list = $menuModel->select('menu_list.*, menu_kategori.Nama_Kategori')
                               ->join('menu_kategori', 'menu_kategori.ID_Kategori = menu_list.ID_Kategori')
                               ->where('menu_list.Menu_Status', 'active')
                               ->orderBy('menu_list.ID_Kategori')
                               ->findAll();

        $data = [
            'menu_list'     => $menu_list,
            'menu_kategori' => $kategoriModel->findAll()
        ];

        return view('Mitra/viewManajemenMenu', $data);
    }

    public function addMenu(){
        $menuModel = new menu_list();

        $file = $this->request->getFile('Gambar');

        $namaFile = null;

        if($file && $file->isValid() && !$file->hasMoved()){
            $namaFile = $file->getRandomName();
            $file->move(FCPATH . 'images/menu', $namaFile);
        }

        $menuModel->save([
            'Nama_Menu'      => $this->request->getPost('Nama_Menu'),
            'ID_Kategori'    => $this->request->getPost('ID_Kategori'),
            'Harga'          => $this->request->getPost('Harga'),
            'Deksripsi_Menu' => $this->request->getPost('Deskripsi_Menu'),
            'Nama_Gambar'    => $namaFile
        ]);

        return redirect()->to('/Mitra/controllerManajemenMenu');
    }

    public function addKategori(){
        $kategoriModel = new menu_kategori();

        $kategoriModel->save([
            'Nama_Kategori' => $this->request->getPost('Nama_Kategori')
        ]);

        return redirect()->to('/Mitra/controllerManajemenMenu');
    }

    public function deleteMenu($id){
        $menuModel = new menu_list();

        $new_menu_status = $this->request->getPost('deleteMenu');

        $menuModel->update($id, ['Menu_Status' => $new_menu_status]);

        return redirect()->to('/Mitra/controllerManajemenMenu')->with('success', 'Menu berhasil dihapus');
    }

    public function editMenu(){
        $menuModel = new menu_list();
        $idMenu = $this->request->getPost('ID_Menu');

        $data = [
            'Nama_Menu'      => $this->request->getPost('Nama_Menu'),
            'ID_Kategori'    => $this->request->getPost('ID_Kategori'),
            'Harga'          => $this->request->getPost('Harga'),
            'Deskripsi_Menu' => $this->request->getPost('Deskripsi_Menu'),
        ];

        $file = $this->request->getFile('Gambar');
        $namaGambarLama = $this->request->getPost('Nama_Gambar');

        if($file && $file->isValid() && !$file->hasMoved()){
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $ext = $file->getClientExtension();

            if(!in_array(strtolower($ext), $allowedExtensions)){
                return redirect()->back()->with('error', 'Format gambar tidak didukung. Hanya JPG, JPEG, dan PNG yang diperbolehkan');
            }

            if($file->getSize() > 2 * 1024 * 1024){
                return redirect()->back()->with('error', 'Ukuran file terlalu besar. maksimal 2MB');
            }

            
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'images/menu/', $newName);
            $data['Nama_Gambar'] = $newName;
        }else{
            $data['Nama_Gambar'] = $namaGambarLama;
        }

        $menuModel->update($idMenu, $data);

        return redirect()->to('/Mitra/controllerManajemenMenu')->with('success', 'Menu Berhasil Diperbarui');
    }

    public function deleteKategori($id){
        $kategoriModel = new menu_kategori();
        $kategoriModel->delete($id);
        return redirect()->to('/Mitra/controllerManajemenMenu');
    }
}

?>