<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class Detail_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_user($email)
    {

        return $this->db->table('user')->getwhere(['email' => $email])->getRowArray();
    }

    public function get_laptop($id)
    {

        return $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->getWhere(['id_laptop' => $id])
            ->getRowArray();
    }

    public function get_one_pic($id_pic)
    {
        return $this->db->table('multiple')
            ->where('sampul', 1)
            ->getWhere(['id_upload' => $id_pic])
            ->getResultArray();
    }

    public function get_all_pic($id_pic)
    {
        return $this->db->table('multiple')
            ->where('sampul', 0)
            ->getWhere(['id_upload' => $id_pic])
            ->getResultArray();
    }
}
