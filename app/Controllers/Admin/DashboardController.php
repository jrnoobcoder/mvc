<?php
namespace App\Controllers\Admin;

use Core\Controller;

class DashboardController extends Controller {
    /**
     * Index function to call admin dashboard
     * 
     */
    public function index(){
        $this->renderView("admin/dashboard");
    }


}