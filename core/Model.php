<?php
namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Model {
    protected $db;

    public function __construct() {
        try {
            $this->db = new Capsule;
            $this->db->addConnection([
                'driver'    => 'mysql',
                'host'      => '127.0.0.1',
                'database'  => 'micro',
                'username'  => 'micro',
                'password'  => 'micro@123',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'strict'    => true,
            ]);

            $this->db->setAsGlobal();
            $this->db->bootEloquent();
            $this->db->getConnection()->getPdo();
        }catch (\Exception $e) {
            echo "Database connection failed: " . $e->getMessage();
            die();
        }
    }
}
