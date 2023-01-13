<?php

namespace App\Controllers\Customer;

use CodeIgniter\Controller;
use App\Models\Customer\Category_model;
use App\Models\Customer\Transaksi_model;

class Product_category extends Controller
{
    public function __construct()
    {
        $this->category = new Category_model();
        $this->transaksi = new Transaksi_model();
        $this->session = \Config\Services::session();
    }

    public function bisnis()
    {
        $email = $this->session->get('email');
        if ($email) {
            $id = 'bisnis';
            $data = [
                'judul' => 'Katalog',
                'header' => 'Daftar Laptop Bisnis',
                'numrows_cart' => $this->transaksi->numrows_cart($email),
                'user' => $this->category->get_user($email),
                'laptop_product' => $this->category->get_all_laptop_bisnis($id)
            ];

            echo view('customer/product-category', $data);
        } else {
            $id = 'bisnis';
            return redirect()->to(base_url('auth/' . $id));
        }
    }
    public function gaming()
    {
        $email = $this->session->get('email');
        if ($email) {
            $id = 'gaming';
            $data = [
                'judul' => 'Katalog',
                'header' => 'Daftar Laptop Gaming',
                'numrows_cart' => $this->transaksi->numrows_cart($email),
                'user' => $this->category->get_user($email),
                'laptop_product' => $this->category->get_all_laptop_gaming($id)
            ];

            echo view('customer/product-category', $data);
        } else {
            $id = 'gaming';
            return redirect()->to(base_url('auth/' . $id));
        }
    }


    public function multimedia()
    {
        $email = $this->session->get('email');
        if ($email) {
            $id = 'multimedia';
            $data = [
                'judul' => 'Katalog',
                'header' => 'Daftar Laptop multimedia',
                'user' => $this->category->get_user($email),
                'numrows_cart' => $this->transaksi->numrows_cart($email),
                'laptop_product' => $this->category->get_all_laptop_Multimedia($id)
            ];

            echo view('customer/product-category', $data);
        } else {
            $id = 'multimedia';
            return redirect()->to(base_url('auth/' . $id));
        }
    }


    public function ultrabook()
    {
        $email = $this->session->get('email');
        if ($email) {
            $id = 'ultrabook';
            $data = [
                'judul' => 'Katalog',
                'header' => 'Daftar Laptop Ultrabook',
                'numrows_cart' => $this->transaksi->numrows_cart($email),
                'user' => $this->category->get_user($email),
                'laptop_product' => $this->category->get_all_laptop_ultrabook($id)
            ];

            echo view('customer/product-category', $data);
        } else {
            $id = 'ultrabook';
            return redirect()->to(base_url('auth/' . $id));
        }
    }
}
