<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
        $this->db = db_connect();
    }
    public function index()
    {
        $email = $this->session->get('email');
        $data["transaksi"] = $this->db->table("transaksi t")
        ->join("laptop l", 
            "l.id_laptop = t.id_laptop"
        , "LEFT")
        ->select("
            t.id_rental,
            l.id_laptop,
            CONCAT(l.merk, ' ', l.seri) laptop,
            t.jumlah_pinjam,
            (l.harga * t.jumlah_pinjam) total_harga
        ")
        ->where("status_rental='1'")
        ->get()
        ->getResultArray();
        $data['user'] = $this->db->table("user")->where("email", $email)->get()->getRowArray();
        return view("admin/data_transaksi", $data);
    }
}
