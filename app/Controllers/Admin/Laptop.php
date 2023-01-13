<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Laptop extends BaseController
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
        $laptop = $this->db->table("laptop")
        ->get()
        ->getResultArray();
        $data = [
            'user' => $this->db->table("user")->where("email", $email)->get()->getRowArray(),
            "laptop" => $laptop
        ];

        return view("admin/data_laptop", $data);
    }

    public function create()
    {
        # code...
    }

    public function delete($id)
    {
        $this->db->table("laptop")->where("id_laptop", $id)->delete();
        return redirect()->to(base_url('admin/laptop'));
    }
}
