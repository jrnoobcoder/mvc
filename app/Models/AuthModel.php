<?php
namespace App\Models;

use Core\Model;
use Zend\Diactoros\Response\JsonResponse;
use Core\SessionManager;
class AuthModel extends Model {
    public function validateUser($data) {
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
       
        $user = $this->db->table('admins')->where('email', $email)->first();

        if (!$user || !password_verify($password, $user->password)) {
            return new JsonResponse(['error' => 'Invalid credentials'], 401);
        }else{
            SessionManager::start();
            $token = bin2hex(random_bytes(16)); 
            SessionManager::set('user', [
                'email' => $email,
                'token' => $token,
                // Add other user details as needed
            ]);
            return new JsonResponse(['token' => $token], 200);
        }

        
    }

    public function getUser($id) {
        return $this->db->table('users')->find($id);
    }
}
