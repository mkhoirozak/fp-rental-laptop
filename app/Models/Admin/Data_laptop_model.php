<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Data_laptop_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_user($email)
    {

        return $this->db->table('user')->getwhere(['email' => $email])->getRowArray();
    }

    public function get_laptop_all()
    {

        return $this->db->table('laptop')
            ->get()->getResultArray();
    }

    public function tambah_data($data)
    {
        return $this->db->table('laptop')->insert($data);
    }

    public function tambah_multiple($data_upload)
    {
        return $this->db->table('multiple')
            ->insert($data_upload);
    }

    public function update_sampul($id_upload, $sampul)
    {

        return $this->db->table('multiple')
            // ->orderBy('sampul', 'DESC')
            ->limit(1)
            ->update($sampul, ['id_upload' => $id_upload]);
    }

    public function get_laptop_by_id($id)
    {

        return $this->db->table('laptop')->getwhere(['id_laptop' => $id])->getRowArray();
    }

    public function get_all_pic($id)
    {
        return $this->db->table('multiple')
            ->getWhere(['id_upload' => $id])
            ->getResultArray();
    }

    public function delete_by_id($id)
    {

        $this->db->table('laptop')->delete(['id_laptop' => $id]);
    }

    public function ubah_data($data, $id)
    {

        return $this->db->table('laptop')->update($data, ['id_laptop' => $id]);
    }
}
