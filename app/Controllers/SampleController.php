<?php
namespace App\Controllers;

use Core\Controller;
use Zend\Diactoros\Response\JsonResponse;

class SampleController extends Controller {
    public function index() {
		// echo "asdfa";
		
        $userModel = $this->loadModel('SampleModel');
        $users = $userModel->getUsers();
		//print($users);
        $this->renderView("test",['users' => $users]);
        //return new JsonResponse($users);
    }

    public function show($vars) {
        //print_r($vars['id'] );
        $userModel = $this->loadModel('SampleModel');
        $user = $userModel->getUser($vars['id']);

        $this->renderView("about",['user' => $user]);
        // if ($user) {
        //     return new JsonResponse($user);
        // }
        // return new JsonResponse(['message' => 'User not found'], 404);
    }
}
