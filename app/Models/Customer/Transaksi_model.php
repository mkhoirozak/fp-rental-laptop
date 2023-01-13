<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class Transaksi_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function insert_data($data)
    {
        $this->db->table('transaksi')->insert($data);
    }

    public function get_laptop($id)
    {
        return $this->db->table('laptop')
            ->getWhere(['id_laptop' => $id])
            ->getRowArray();
    }

    public function update_jumlah_laptop($id, $data)
    {
        $this->db->table('laptop')
            ->where('id_laptop', $id)
            ->update($data);
    }

    public function show_cart($email)
    {
        return $this->db->table('transaksi')
            ->join('laptop', 'laptop.id_laptop = transaksi.id_laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('sampul', 1)
            ->getwhere(['customer' => $email])
            ->getResultArray();
    }

    public function numrows_cart($email)
    {
        return $this->db->table('transaksi')
            ->selectCount('customer', 'numrows')
            ->getWhere(['customer' => $email])
            ->getRowArray();
    }

    public function get_total($email)
    {
        return $this->db->table('transaksi')
            ->selectSum('total', 'total')
            ->getWhere(['customer' => $email])
            ->getRowArray();
    }

    public function delete_rental($id)
    {
        $this->db->table('transaksi')
            ->where('id_rental', $id)
            ->delete();
    }

    public function getID_laptop($id)
    {
        return $this->db->table('transaksi')
            ->join('laptop', 'laptop.id_laptop = transaksi.id_laptop')
            ->getWhere(['id_rental' => $id])
            ->getRowArray();
    }
}
