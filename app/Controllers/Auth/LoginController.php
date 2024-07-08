<?php
namespace App\Controllers\Auth;

use Core\Controller;

class LoginController extends Controller {
    /**
     * Index function to call admin dashboard
     * 
     */
    public function index(){
        $this->renderView("login/login");
    }


}