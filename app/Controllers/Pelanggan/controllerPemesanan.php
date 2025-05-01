<?php
namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Database\menu_list;
use App\Models\Database\menu_kategori;
use App\Models\Database\order_list;

class controllerPemesanan extends BaseController{
    public function viewPemesanan(){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Harap login terlebih dahulu');
        }

        $menuModel = new menu_list();
        $kategoriModel = new menu_kategori();

        $menu_all = $menuModel->select('menu_list.*, menu_kategori.Nama_Kategori')
                      ->join('menu_kategori', 'menu_kategori.ID_Kategori = menu_list.ID_Kategori')
                      ->where('menu_list.Menu_Status', 'active')
                      ->findAll();

        $menu_list = [];
        foreach($menu_all as $menu){
            $kategori = $menu['Nama_Kategori'];
            if(!isset($menu_list[$kategori])){
                $menu_list[$kategori] = [];
            }
            $menu_list[$kategori][] = $menu;
        }

        $nama_menu_keranjang = [];
        foreach($menu_list as $menus){
            foreach($menus as $menu){
                $nama_menu_keranjang[$menu['ID_Menu']] = $menu['Nama_Menu'];
            }
        }

        $data = [
            'menu_list'           => $menu_list,
            'menu_kategori'       => $kategoriModel->findAll(),
            'keranjang'           => session()->get('keranjang') ?? [],
            'nama_menu_keranjang' => $nama_menu_keranjang
        ];

        return view('Pelanggan/viewPemesanan', $data);
    }

    public function tambahKeranjang(){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Harap login terlebih dahulu');
        }
    
        $id_menu = $this->request->getPost('ID_Menu');
        $jumlah = (int) $this->request->getPost('jumlah');
    
        $keranjang = session()->get('keranjang') ?? [];
    
        if (isset($keranjang[$id_menu])){
            $keranjang[$id_menu] += $jumlah;
        }else{
            $keranjang[$id_menu] = $jumlah;
        }
    
        session()->set('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Berhasil ditambahkan ke keranjang.');
    }

    public function checkout(){
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Harap login terlebih dahulu');
        }
    
        $keranjang = session()->get('keranjang');
        if(!$keranjang || empty($keranjang)){
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }
    
        $orderModel = new order_list();
        $id_user = session()->get('ID_User');
    
        foreach($keranjang as $id_menu => $jumlah){
            for($i = 0; $i < $jumlah; $i++){
                $orderModel->insert([
                    'ID_User'     => $id_user,
                    'ID_Menu'     => $id_menu,
                    'Waktu_Order' => date('Y-m-d H:i:s')
                ]);
            }
        }
    
        session()->remove('keranjang');
        return redirect()->back()->with('success', 'Pemesanan berhasil!');
    }

    public function kurangiKeranjang(){
        $session = session();
        $id_menu = $this->request->getPost('ID_Menu');

        $keranjang = $session->get('keranjang') ?? [];

        if(isset($keranjang[$id_menu])){
            $keranjang[$id_menu]--;
            if($keranjang[$id_menu] <= 0){
                unset($keranjang[$id_menu]);
            }
        }

        $session->set('keranjang', $keranjang);
        return redirect()->back();
    }
}
?>