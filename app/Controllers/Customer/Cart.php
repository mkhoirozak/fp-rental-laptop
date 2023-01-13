<?php

namespace App\Controllers\Customer;

use CodeIgniter\Controller;
use App\Models\Customer\Transaksi_model;
use App\Models\Customer\Detail_model;

class Cart extends Controller
{
    public function __construct()
    {
        $this->transaksi = new Transaksi_model();
        $this->detail = new Detail_model();
        $this->session = \Config\Services::session();
        $this->email = $this->session->get('email');
        helper(['form', 'url']);
        $this->db = db_connect();
    }


    public function index()
    {
        if ($this->email) {

            $data = [
                'judul' => 'Keranjang  ',
                'user' => $this->detail->get_user($this->email),
                'carts' => $this->transaksi->show_cart($this->email),
                'numrows_cart' => $this->transaksi->numrows_cart($this->email),
                'sum' => $this->transaksi->get_total($this->email)
            ];

            $data["diajukan"] = $this->db->table("transaksi")->where([
                "status_rental" => "0",
                "customer" => $this->email
            ])->selectCount("*", "belum_rental")
            ->get()
            ->getRowArray();

            echo view('customer/cart', $data);
        } else {
            return redirect()->to(base_url('/'));
        }
    }

    public function delete($id) //id_rental
    {

        //Update jumlah laptop setelah tombol hapus 
        $laptop = $id_laptop = $this->transaksi->getId_laptop($id);
        $laptop = $laptop['jumlah'] + $laptop['jumlah_pinjam'];
        $data = ['jumlah' => $laptop];
        $this->transaksi->update_jumlah_laptop($id_laptop['id_laptop'], $data);

        //hapus id rental
        $this->transaksi->delete_rental($id);
        return redirect()->to(base_url('cart'));
    }

    public function pay()
    {
        $this->db->table("transaksi")->where("customer", $this->email)->update(
            [
                "status_rental" => "1"
            ]
        );
        return redirect()->to(base_url('cart'));
    }
}
