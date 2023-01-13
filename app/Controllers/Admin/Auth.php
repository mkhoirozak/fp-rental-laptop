<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Admin\Auth_model;

class Auth extends Controller
{
    public function __construct()
    {
        $this->auth = new Auth_model();
        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['form', 'url']);
    }

    public function index($id = null)
    {
        $valid = null;

        if ($this->request->getmethod() === 'post') {
            $valid = $this->validate(
                [
                    'email' => ['label' => 'Email', 'rules' => 'required'],
                    'password' => ['label' => 'Password', 'rules' => 'required']
                ]
            );
        }

        if (!$valid) {
            $data = [
                'judul' => 'Login',
                'id' => $id
            ];
            echo view('auth/login', $data);
        } else {
            return $this->login();
        }
    }

    public function login()
    {
        $id = $this->request->getpost('id_category');

        $email = $this->request->getpost('email');
        $password = $this->request->getpost('password');

        $user = $this->auth->get_user($email);

        if ($user) {
            if ($user['aktivasi'] == 1) {
                if ($password == $user['password']) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set($data);
                    if ($user['role_id'] == 3 or 2) {

                        if ($id == 'bisnis') {
                            return redirect()->to(base_url('category/bisnis'));
                        } else if ($id == 'gaming') {
                            return redirect()->to(base_url('category/gaming'));
                        } else if ($id == 'multimedia') {
                            return redirect()->to(base_url('category/multimedia'));
                        } else if ($id == 'ultrabook') {
                            return redirect()->to(base_url('category/ultrabook'));
                        } else if (!empty($id)) {
                            return redirect()->to(base_url('detail/' . $id));
                        } else {
                            return redirect()->to(base_url());
                        }
                    } else {
                        return redirect()->to(base_url('admin/dashboard'));
                    }
                } else {
                    $this->session->setflashdata('pesan', '<div class="alert alert-dismissible fade show text-center" role="alert" style="background-color: #d85a5a;">
            <strong>Password salah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                    return redirect()->to(base_url('auth'));

                    $this->session->destroy();
                }
            } else {
                $this->session->setflashdata('pesan', '<div class="alert alert-dismissible fade show text-center" role="alert" style="background-color: #d85a5a;">
                <strong>Email belum aktif</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                return redirect()->to(base_url('auth'));

                $this->session->destroy();
            }
        } else {
            $this->session->setflashdata('pesan', '<div class="alert alert-dismissible fade show text-center" role="alert" style="background-color: #d85a5a;">
        <strong>Email tidak terdaftar</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
            return redirect()->to(base_url('auth'));

            $this->session->destroy();
        }
    }

    public function register()
    {

        $data = [
            'judul' => 'Halaman Register'
        ];
        echo view('auth/register', $data);
    }

    public function menu_register()
    {

        $valid = $this->validate(
            [

                'nama' => ['label' => 'Nama', 'rules' => 'required'],
                'email' => ['label' => 'email', 'rules' => 'required|is_unique[user.email]'],
                'kelamin' => ['label' => 'kelamin', 'rules' => 'required'],
                'password1' => ['label' => 'password1', 'rules' => 'required|min_length[3]'],
                'password2' => ['label' => 'password2', 'rules' => 'required|min_length[3]|matches[password1]']
            ],
            [
                'password1' => [

                    'min_length' => 'Password minimal 3 digit'
                ],
                'password2' => [
                    'matches' => 'password tidak sama',
                    'min_length' => 'Password minimal 3 digit'
                ]
            ]
        );

        if (!$valid) {
            $this->register();
        } else {

            $data = [
                'nama' => $this->request->getpost('nama'),
                'email' => $this->request->getpost('email'),
                'kelamin' => $this->request->getpost('kelamin'),
                'password' => $this->request->getpost('password1'),
                'role_id' => 3,
                'aktivasi' => 1

            ];

            $this->auth->add_user($data);
            $this->session->setflashdata('pesan', '<div class="alert alert-dismissible fade show text-center" role="alert" style="background-color: #5ad877;">
            <strong>Akun berhasil dibuat, silakan login</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            return redirect()->to(base_url('admin/auth'));
            $this->session->destroy();
        }
    }

    public function logout()
    {

        $data = [
            'email',
            'role_id'
        ];

        $this->session->remove($data);
        return redirect()->to(base_url());
    }

    //--------------------------------------------------------------------

}
