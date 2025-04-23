<?php

namespace App\Controllers\Mitra;

use App\Controllers\BaseController;
use App\Models\Database\menu_list;
use App\Models\Database\menu_kategori;

class controllerManajemenMenu extends BaseController{
    public function viewManajemenMenu(){
        $menuModel = new menu_list();
        $kategoriModel = new menu_kategori();

        $menu_list = $menuModel->select('menu_list.*, menu_kategori.Nama_Kategori')
                               ->join('menu_kategori', 'menu_kategori.ID_Kategori = menu_list.ID_Kategori')
                               ->findAll();

        $data = [
            'menu_list' => $menu_list,
            'menu_kategori' => $kategoriModel->findAll()
        ];

        return view('Mitra/viewManajemenMenu', $data);
    }

    public function addMenu(){
        $menuModel = new menu_list();

        $menuModel->save([
            'Nama_Menu' => $this->request->getPost('Nama_Menu'),
            'ID_Kategori' => $this->request->getPost('ID_Kategori'),
            'Harga' => $this->request->getPost('Harga')
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
        $menuModel->delete($id);
        return redirect()->to('/Mitra/controllerManajemenMenu');
    }

    public function editMenu(){
        $menuModel = new menu_list();

        $menuModel->update($this->request->getPost('ID_Menu'), [
            'Nama_Menu'   => $this->request->getPost('Nama_Menu'),
            'ID_Kategori' => $this->request->getPost('ID_Kategori'),
            'Harga'       => $this->request->getPost('Harga')
        ]);
        return redirect()->to('/Mitra/controllerManajemenMenu');
    }


    public function deleteKategori($id){
        $kategoriModel = new menu_kategori();
        $kategoriModel->delete($id);
        return redirect()->to('/Mitra/controllerManajemenMenu');
    }
}

?>