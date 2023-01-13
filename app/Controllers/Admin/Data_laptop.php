<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Data_laptop_model;

class Data_laptop extends Controller
{

    public function __construct()
    {
        $this->laptop = new Data_laptop_model();
        $this->session = \Config\Services::session();
        helper(['form', 'url']);
        $this->random = rand(000000, 999999);
    }

    public function is_loggin()
    {
        $email = $this->session->get('email');
        if (!$email) {
            return redirect()->to('auth');
        }
    }

    public function index()
    {
        // return $this->is_loggin();
        $email = $this->session->get('email');
        if (!$email) {
            return redirect()->to('auth');
        } else {
            $email = $this->session->get('email');
            $data['user'] = $this->laptop->get_user($email);
            $data['laptop'] = $this->laptop->get_laptop_all();
            $data['judul'] = 'Data Laptop';

            echo view('admin/data_laptop', $data);
        }
    }

    public function form_tambah()
    {

        $email = $this->session->get('email');
        $data = [
            'judul' => 'Form Tambah Data Laptop',
            'user' => $this->laptop->get_user($email)
        ];
        $data['tipe'] = [
            'Gaming',
            'Ultrabook',
            'Bisnis',
            'Multimedia'
        ];


        echo view('admin/form_tambah', $data);
    }

    public function tambah()
    {


        $valid = $this->validate([

            'merk' => ['label' => 'Merk', 'rules' => 'required'],
            'seri' => ['label' => 'Seri', 'rules' => 'required'],
            'tipe' => ['label' => 'tipe', 'rules' => 'required'],
            'prosesor' => ['label' => 'prosesor', 'rules' => 'required'],
            'ram' => ['label' => 'RAM', 'rules' => 'required'],
            'layar' => ['label' => 'layar', 'rules' => 'required'],
            'penyimpanan' => ['label' => 'penyimpanan', 'rules' => 'required'],
            'vga' => ['label' => 'VGA', 'rules' => 'required'],
            'harga' => ['label' => 'harga', 'rules' => 'required'],
            'deskripsi' => ['label' => 'deskripsi', 'rules' => 'required'],
            'jumlah' => ['label' => 'jumlah', 'rules' => 'required'],
        ]);

        if (!$valid) {
            $this->form_tambah();
        } else {

            $upload   = $this->request->getfiles();

            if ($upload) {
                foreach ($upload['image'] as $img) {

                    $data_upload = [
                        'id_upload' => $id_upload = $this->random,
                        'gambar' => $gambar = $img->getname()
                        // = str_replace($img, 'gambar' . $i++ . '.jpg', $img)
                    ];

                    $sampul = [
                        'sampul' => 1
                    ];

                    $cek = $this->laptop->tambah_multiple($data_upload, $id_upload, $sampul);
                    $this->laptop->update_sampul($id_upload, $sampul);
                    $img->move(ROOTPATH . 'public/img/upload', $gambar);
                }
            }
            $data = [

                'nama_tipe' => $this->request->getpost('tipe'),
                'merk' => $this->request->getpost('merk'),
                'seri' => $this->request->getpost('seri'),
                'prosesor' => $this->request->getpost('prosesor'),
                'ram' => $this->request->getpost('ram'),
                'penyimpanan' => $this->request->getpost('penyimpanan'),
                'layar' => $this->request->getpost('layar'),
                'vga' => $this->request->getpost('vga'),
                'harga' => $this->request->getpost('harga'),
                'denda' => 0,
                'id_upload' => $this->random,
                'jumlah' => $this->request->getpost('jumlah'),
                'deskripsi' => $this->request->getpost('deskripsi'),
                'tanggal' => time()
            ];



            $simpan = $this->laptop->tambah_data($data);

            if ($simpan) {
                $session = \Config\Services::session();

                $session->setflashdata('message', 'ditambah');
                return redirect()->to('http://localhost/rental_laptop/data_laptop');
            }
        }
    }

    public function detail($id)
    {

        $email = $this->session->get('email');
        $data =
            [
                'judul' => 'Detail Laptop',
                'laptop' => $laptop = $this->laptop->get_laptop_by_id($id),
                'image' => $this->laptop->get_all_pic($laptop['id_upload']),
                'user' => $this->laptop->get_user($email)
            ];

        echo view('admin/detail_laptop', $data);
    }

    public function hapus($id)
    {
        $this->laptop->delete_by_id($id);
        $session = \Config\Services::session();

        $session->setflashdata('message', 'dihapus');
        return redirect()->to('http://localhost/rental_laptop/data_laptop');
    }

    public function form_ubah($id)
    {
        $email = $this->session->get('email');

        $data =
            [
                'judul' => 'Form Ubah Laptop',
                'laptop' => $this->laptop->get_laptop_by_id($id),
                'user' => $this->laptop->get_user($email)
            ];
        $data['tipe'] = [
            'Gaming',
            'Netbook',
            'Standar',
            'Ultrabook',
            'Hybrid',
            'Bisnis',
            'Multimedia'
        ];

        echo view('admin/ubah_laptop', $data);
    }

    public function ubah()
    {

        $valid = $this->validate([

            'merk' => ['label' => 'Merk', 'rules' => 'required'],
            'seri' => ['label' => 'Seri', 'rules' => 'required'],
            'tipe' => ['label' => 'tipe', 'rules' => 'required'],
            'prosesor' => ['label' => 'prosesor', 'rules' => 'required'],
            'ram' => ['label' => 'RAM', 'rules' => 'required'],
            'layar' => ['label' => 'layar', 'rules' => 'required'],
            'penyimpanan' => ['label' => 'penyimpanan', 'rules' => 'required'],
            'vga' => ['label' => 'VGA', 'rules' => 'required'],
            'harga' => ['label' => 'harga', 'rules' => 'required'],
            'jumlah' => ['label' => 'jumlah', 'rules' => 'required'],
            'deskripsi' => ['label' => 'deskripsi', 'rules' => 'required'],
        ]);
        if (!$valid) {
            $data =
                [
                    'judul' => 'Form Ubah Laptop',
                ];
            $id = $this->request->getpost('id_laptop');
            $data['laptop'] = $this->laptop->get_laptop_by_id($id);
            $data['tipe'] = [
                'Gaming',
                'Netbook',
                'Standar',
                'Ultrabook',
                'Hybrid',
                'Bisnis',
                'Multimedia'
            ];
            echo view('admin/ubah_laptop', $data);
        } else {

            $data = [
                'id_laptop' => $this->request->getpost('id_laptop'),
                'nama_tipe' => $this->request->getpost('tipe'),
                'merk' => $this->request->getpost('merk'),
                'seri' => $this->request->getpost('seri'),
                'prosesor' => $this->request->getpost('prosesor'),
                'ram' => $this->request->getpost('ram'),
                'penyimpanan' => $this->request->getpost('penyimpanan'),
                'layar' => $this->request->getpost('layar'),
                'vga' => $this->request->getpost('vga'),
                'harga' => $this->request->getpost('harga'),
                'denda' => 0,
                'id_upload' => $this->request->getpost('id_upload'),
                'jumlah' => $this->request->getpost('jumlah'),
                'deskripsi' => $this->request->getpost('deskripsi'),
                'tanggal' => time()
            ];
            $id = $this->request->getpost('id_laptop');
            $simpan = $this->laptop->ubah_data($data, $id);

            if ($simpan) {
                $session = \Config\Services::session();

                $session->setflashdata('message', 'diubah');
                return redirect()->to('http://localhost/rental_laptop/data_laptop');
            }
        }
    }
}
