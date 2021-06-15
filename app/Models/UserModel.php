<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'birth_date', 'email', 'password', 'gender', 'address'];

    public function noticeTable() {
        $builder = $this->db->table('contacts');
        return $builder;
    }

    public function button() {
        $action_button = function($row) {
            return '<a class="btn btn-warning btn-sm edit" href="'.base_url().'/edituser/'.$row['id'].'">Edit</a>
				&nbsp;
				<a class="btn btn-danger btn-sm delete" href="'.base_url().'/deleteuser/'.$row['id'].'">Delete</a>
				';
        };

        return $action_button;
    }

}
