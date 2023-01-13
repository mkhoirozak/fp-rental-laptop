<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
        $this->db = db_connect();
    }
    public function index()
    {
        $email = $this->session->get("email");
        if (empty($email)) {
            return redirect()->to(base_url('/'));
        }

        $data["judul"] = "Profile";
        $data["user"] = $this->db->table("user")->where(["email" => $email])
        ->get()
        ->getRowArray();
        $data["jenis_kelamin"] = [
            "Laki-laki",
            "Perempuan",
        ];

        return view("customer/profile", $data);
    }

    public function update()
    {
        $nama     = $this->request->getVar("nama");
        $kelamin  = $this->request->getVar("kelamin");
        $password = $this->request->getVar("password");

        $data = [
            "nama"    => $nama,
            "kelamin" => $kelamin,
        ];

        if (!empty($password))
        {
            $data["password"] = $password;
        }
        $this->db->table("user")->where([
            "email" => $this->session->get("email")
        ])->update($data);

        return redirect()->to("profile");
    }
}
