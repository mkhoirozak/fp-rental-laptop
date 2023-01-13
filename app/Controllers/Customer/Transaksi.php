<?php

namespace App\Controllers\Customer;

use CodeIgniter\Controller;
use App\Models\Customer\Transaksi_model;
use App\Models\Customer\Detail_model;

class Transaksi extends Controller
{
    public function __construct()
    {
        $this->transaksi = new Transaksi_model();
        $this->detail = new Detail_model();
        $this->session = \Config\Services::session();
        $this->email = $this->session->get('email');
        helper(['form', 'url']);
    }

    public function index($id) //id_laptop
    {

        //jika ada session login
        if ($this->email) {
            $valid = null;

            if ($this->request->getmethod() === 'post') {
                $valid = $this->validate(
                    [
                        'tgl_pinjam' => ['rules' => 'required'],
                        'tgl_kembali' => ['rules' => 'required'],
                        'jumlah_pinjam' => ['rules' => 'required|decimal|is_natural_no_zero']
                    ],
                    [
                        'tgl_pinjam' => ['required' => 'Harus diisi!'],
                        'tgl_kembali' => ['required' => 'Harus diisi!'],
                        'jumlah_pinjam' => [
                            'required' => 'Harus diisi!',
                            'decimal' => 'Harus angka!',
                            'is_natural_no_zero' => 'Harus lebih dari 0!'
                        ]
                    ]
                );
            }

            $now = time();
            $tgl_pinjam = strtotime($this->request->getpost('tgl_pinjam')) + (60 * 60 * 23);
            $tgl_kembali = strtotime($this->request->getpost('tgl_kembali'));

            $laptop = $this->detail->get_laptop($id);
            $jumlah_pinjam = $this->request->getpost('jumlah_pinjam');

            $id_pic = $laptop['id_upload'];
            $data = [
                'judul' => 'Katalog',
                'user' => $this->detail->get_user($this->email),
                'laptop' =>  $laptop,
                'multiple' => $this->detail->get_all_pic($id_pic),
                'one_pic' => $this->detail->get_one_pic($id_pic)
            ];


            //validasi tahap pertama
            if (!$valid) {
                echo view('customer/detail-laptop', $data);

                //Validasi tahap kedua
            } else if ($now > $tgl_pinjam or $tgl_pinjam >= $tgl_kembali or $laptop['jumlah'] < $jumlah_pinjam) {

                if ($tgl_pinjam >= $tgl_kembali) {
                    $this->session->setflashdata('gagal', 'Format tanggal salah!');
                } else if ($now > $tgl_pinjam) {
                    $this->session->setflashdata('gagal', 'Minimal tanggal sekarang!');
                } else if ($laptop['jumlah'] < $jumlah_pinjam) {
                    $this->session->setflashdata('gagal', 'Maaf, stok laptop hanya ada ' . $laptop['jumlah']);
                }
                echo view('customer/detail-laptop', $data);

                //Validasi berhasil
            } else {
                return $this->transaksi($id);
            }

            // jika tidak ada session login, maka redirect ke auth
        } else {
            return redirect()->to(base_url('auth'));
        }
    }


    public function transaksi($id) //id_laptop
    {
        $tgl_kembali = strtotime($kembali = $this->request->getpost('tgl_kembali'));
        $tgl_pinjam = strtotime($pinjam = $this->request->getpost('tgl_pinjam'));
        $jumlah_pinjam = $this->request->getpost('jumlah_pinjam');
        $harga = $this->request->getpost('harga') / 7;

        $durasi = ($tgl_kembali - $tgl_pinjam) / (60 * 60 * 24);
        $total = $harga * $jumlah_pinjam * $durasi;

        $data = [
            'customer' => $this->email,
            'id_laptop' => $id,
            'tgl_pinjam' => $pinjam,
            'tgl_kembali' => $kembali,
            'harga' => $harga,
            'denda' => $this->request->getpost('denda'),
            'jumlah_pinjam' => $jumlah_pinjam,
            'total' => $total,
            'status_pengembalian' => 0,
            'status_rental' => 0
        ];
        $this->transaksi->insert_data($data);

        //Update jumlah laptop setelah diinput
        $laptop = $this->transaksi->get_laptop($id);
        $laptop = $laptop['jumlah'] - $jumlah_pinjam;
        $data = ['jumlah' => $laptop];
        $this->transaksi->update_jumlah_laptop($id, $data);

        $this->session->setflashdata('berhasil', 'Pesanan Anda berhasil dibuat, silakan buka keranjang untuk melanjutkan pembayaran ');
        return redirect()->to(base_url('detail/' . $id));
    }
}
