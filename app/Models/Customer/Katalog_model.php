<?php

namespace App\Models\Customer;

use CodeIgniter\Model;

class Katalog_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get_user($email)
    {

        return $this->db->table('user')->getwhere(['email' => $email])->getRowArray();
    }

    public function get_laptop_bisnis($bisnis, $q="")
    {
        
        $laptop = $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('nama_tipe', $bisnis)
            ->where('sampul', 1)
            ->where('jumlah !=', 0);
        if (!empty($q))
        {
            $laptop = $laptop->like("merk", $q)->orLike("seri", $q)->orLike("prosesor", $q)->orLike("ram", $q)->orLike("penyimpanan", $q);
        }
        return $laptop->get()
            ->getResultArray();
    }

    public function get_laptop_gaming($gaming, $q = "")
    {

        $laptop =  $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('nama_tipe', $gaming)
            ->where('sampul', 1)
            ->where('jumlah !=', 0);
        if (!empty($q))
        {
            $laptop = $laptop->like("merk", $q)->orLike("seri", $q)->orLike("prosesor", $q)->orLike("ram", $q)->orLike("penyimpanan", $q);
        }

        return $laptop->get()
            ->getResultArray();
    }

    public function get_laptop_multimedia($multimedia, $q = "")
    {

        $laptop = $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('nama_tipe', $multimedia)
            ->where('sampul', 1)
            ->where('jumlah !=', 0);
        if (!empty($q))
        {
            $laptop = $laptop->like("merk", $q)->orLike("seri", $q)->orLike("prosesor", $q)->orLike("ram", $q)->orLike("penyimpanan", $q);
        }
        return $laptop->get()
            ->getResultArray();
    }

    public function get_laptop_ultra($ultra, $q = "")
    {

        $laptop = $this->db->table('laptop')
            ->join('multiple', 'multiple.id_upload = laptop.id_upload')
            ->where('nama_tipe', $ultra)
            ->where('sampul', 1)
            ->where('jumlah !=', 0);
        if (!empty($q))
        {
            $laptop = $laptop->like("merk", $q)->orLike("seri", $q)->orLike("prosesor", $q)->orLike("ram", $q)->orLike("penyimpanan", $q);
        }
        return $laptop->get()
            ->getResultArray();
    }
}
