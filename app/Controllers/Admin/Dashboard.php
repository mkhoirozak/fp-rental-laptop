<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Data_laptop_model;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->user = new Data_laptop_model();
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
    }

    public function index()
    {
        $email = $this->session->get('email');

        $data = [
            'judul' => 'Dashboard',
            'user' => $this->user->get_user($email)
        ];
        echo view('admin/dashboard', $data);
    }

    //--------------------------------------------------------------------

}
