<?php

namespace App\Controllers\Customer;

use CodeIgniter\Controller;
use App\Models\Admin\Data_laptop_model;
use App\Models\Customer\Katalog_model;
use App\Models\Customer\Transaksi_model;

class Katalog extends Controller
{
    public function __construct()
    {
        $this->laptop = new Data_laptop_model();
        $this->katalog = new Katalog_model();
        $this->transaksi = new Transaksi_model();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $email = $this->session->get('email');
        $q     = $this->request->getVar("q");
        $bisnis     = 'bisnis';
        $gaming     = 'gaming';
        $multimedia = 'multimedia';
        $ultra      = 'ultrabook';
        $data = [
            'bisnis'       => $this->katalog->get_laptop_bisnis($bisnis, $q),
            'gaming'       => $this->katalog->get_laptop_gaming($gaming, $q),
            'multimedia'   => $this->katalog->get_laptop_multimedia($multimedia, $q),
            'ultra'        => $this->katalog->get_laptop_ultra($ultra, $q),
            'user'         => $this->katalog->get_user($email),
            'numrows_cart' => $this->transaksi->numrows_cart($email),
            'judul'        => 'Katalog',
            "q"            => $q

        ];


        echo view('customer/katalog', $data);
    }
}
