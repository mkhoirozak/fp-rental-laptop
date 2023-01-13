<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Admin\Data_laptop_model;
use App\Models\Customer\Transaksi_model;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->laptop = new Data_laptop_model();
        $this->transaksi = new Transaksi_model();
    }
    public function is_loggin()
    {
        $email = $this->session->get('email');
        if (!$email) {
            return redirect()->to('auth');
        }
    }
    public function index()
    {
        $email = $this->session->get('email');
        if (empty($email)) {
            return redirect()->to("auth");
        }
        $data = [
            'judul' => 'Home',
            'numrows_cart' => $this->transaksi->numrows_cart($email),
            'user' => $this->laptop->get_user($email)
        ];


        echo view('customer/dashboard', $data);
    }

    //--------------------------------------------------------------------

}
