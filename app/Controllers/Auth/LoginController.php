<?php
namespace App\Controllers\Auth;

use Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Capsule\Manager as DB;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Core\SessionManager;

class LoginController extends Controller {
    /**
     * Index function to call admin dashboard
     * 
     */
    public function index(){
        $this->renderView("login/login");
    }

    public function login(ServerRequestInterface $request)
    {
        $data = $request->getParsedBody();
        //print_r($data); die("adsf");
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        // Validate input
        if (empty($email) || empty($password)) {
            return new JsonResponse(['error' => 'Invalid input'], 400);
        }

        $userModel = $this->loadModel('AuthModel');
        $user =  $userModel->validateUser($data);

        //$data = json_decode((string) $user->getBody(), true);

        // Access the data
        // if (isset($data['error'])) {
        //     echo 'Error: ' . $data['error'];
        // } else {
        //     echo 'No error found.';
        // }
        return $user;
    }


    public function logout()
    {
        SessionManager::destroy();
        $response = new \Zend\Diactoros\Response();
        $response->getBody()->write(json_encode(['message' => 'Logout successful']));
        return $response;
    }

}