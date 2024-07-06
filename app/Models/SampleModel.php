<?php
namespace App\Models;

use Core\Model;

class SampleModel extends Model {
    public function getUsers() {
        return $this->db->table('users')->get();
    }

    public function getUser($id) {
        return $this->db->table('users')->find($id);
    }
}
