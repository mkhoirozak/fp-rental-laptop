<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Auth_model extends Model
{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function add_user($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function get_user($email)
    {

        return $this->db->table('user')->getwhere(['email' => $email])->getRowArray();
    }
}
