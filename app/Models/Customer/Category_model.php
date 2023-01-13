<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class Category_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_user($email)
    {

        return $this->db->table('user')->getwhere(['email' => $email])->getRowArray();
    }

    public function get_all_laptop_bisnis($id)
    {

        return $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('sampul', 1)
            ->getWhere(['nama_tipe' => $id])
            ->getResultArray();
    }


    public function get_all_laptop_gaming($id)
    {

        return $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('sampul', 1)
            ->getWhere(['nama_tipe' => $id])
            ->getResultArray();
    }

    public function get_all_laptop_multimedia($id)
    {

        return $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('sampul', 1)
            ->getWhere(['nama_tipe' => $id])
            ->getResultArray();
    }

    public function get_all_laptop_ultrabook($id)
    {

        return $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('sampul', 1)
            ->getWhere(['nama_tipe' => $id])
            ->getResultArray();
    }
}
