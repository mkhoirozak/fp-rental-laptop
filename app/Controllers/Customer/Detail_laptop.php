<?php

namespace App\Controllers\Customer;

use CodeIgniter\Controller;
use App\Models\Customer\Detail_model;
use App\Models\Customer\Transaksi_model;

class Detail_laptop extends Controller
{
    public function __construct()
    {
        $this->detail = new Detail_model();
        $this->transaksi = new Transaksi_model();
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
    }

    public function detail($id)
    {
        $email = $this->session->get('email');
        $laptop = $this->detail->get_laptop($id);
        $id_pic = $laptop['id_upload'];

        $data = [
            'judul' => 'Katalog',
            'user' => $this->detail->get_user($email),
            'laptop' =>  $laptop,
            'multiple' => $this->detail->get_all_pic($id_pic),
            'one_pic' => $this->detail->get_one_pic($id_pic),
            'numrows_cart' => $this->transaksi->numrows_cart($email)
        ];

        echo view('customer/detail-laptop', $data);
    }
}
