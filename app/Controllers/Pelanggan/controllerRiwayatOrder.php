<?php
namespace App\Controllers\Pelanggan;

use App\Controllers\BaseController;
use App\Models\Database\order_list;

class controllerRiwayatOrder extends BaseController {
    public function viewRiwayatOrder() {
        if(!session()->get('isLoggedIn')){
            return redirect()->to('/Pelanggan/controllerLoginAkunPelanggan')->with('error', 'Harap login terlebih dahulu');
        }

        $orderListModel = new order_list();

        $session = session();
        $id_user = $session->get('ID_User');

        $riwayatPemesanan = $orderListModel->select('order_list.ID_Order, akun_pelanggan.ID_User, akun_pelanggan.Nama_Depan, akun_pelanggan.Alamat, order_list.Waktu_Order, SUM(menu_list.Harga) AS Total_Harga, order_status.Order_Status')
                                           ->join('order_status', 'order_status.ID_Order = order_list.ID_Order')
                                           ->join('akun_pelanggan', 'akun_pelanggan.ID_User = order_list.ID_User')
                                           ->join('menu_list', 'menu_list.ID_Menu = order_list.ID_Menu')
                                           ->where('order_list.ID_User', $id_user)
                                           ->groupBy(['order_list.ID_Order', 'order_status.Order_Status'])
                                           ->orderBy('order_list.Waktu_Order', 'DESC')
                                           ->findAll();

        $orderDiproses = [];
        $orderSelesai = [];

        foreach ($riwayatPemesanan as $order) {
            if ($order['Order_Status'] == 'Selesai' || $order['Order_Status'] == 'Dibatalkan') {
                $orderSelesai[] = $order;
            } else {
                $orderDiproses[] = $order;
            }
        }

        $data = [
            'orderDiproses' => $orderDiproses,
            'orderSelesai' => $orderSelesai,
        ];

        return view('Pelanggan/viewRiwayatPemesanan', $data);
    }

    // Endpoint AJAX: Ambil isi order berdasarkan ID_Order
    public function ajaxIsiOrder() {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Bad request']);
        }

        $id_order = $this->request->getGet('ID_Order');
        if (!$id_order) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'ID_Order required']);
        }

        $orderListModel = new order_list();

        $isi_order = $orderListModel->select('menu_list.Nama_Menu, COUNT(order_list.ID_Menu) AS Jumlah, SUM(menu_list.Harga) AS Total_Harga')
                                    ->join('menu_list', 'order_list.ID_Menu = menu_list.ID_Menu')
                                    ->where('order_list.ID_Order', $id_order)
                                    ->groupBy('menu_list.Nama_Menu')
                                    ->findAll();

        return $this->response->setJSON($isi_order);
    }
}
?>