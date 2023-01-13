<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Customer extends BaseController
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
        $customer = $this->db->table("user")
        ->get()
        ->getResultArray();
        $data = [
            'user' => $this->db->table("user")->where("email", $email)->get()->getRowArray(),
            "customer" => $customer
        ];

        return view("admin/data_customer", $data);
    }
}
