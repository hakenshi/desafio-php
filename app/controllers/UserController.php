<?php

namespace App\Controllers;

use App\models\User;
use Exception;

class UserController
{

    public function auth()
    {
        if (isset($_SESSION['user'])) {
            header('Location: resources/views/home.php');
        }
    }

    public function login()
    {
        $data = json_decode(file_get_contents("php://input"));
        $user = new User();
        $_SESSION['user'] = $user->authUser($data);
        echo json_encode([
            'message' => 'Usuário logado com sucesso!',
            'status' => 200
        ]);
    }


    public function register()
    {
        $data = json_decode(file_get_contents("php://input"));
        try {
            if (!filter_var($data->email_user, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Por favor insira um email válido.");
            }
            $data->password_user = password_hash($data->password_user, CRYPT_SHA256);
            $_SESSION['user'] = User::create($data);
            echo json_encode([
                'message' => 'Usuário cadastrado com sucesso!',
                'status' => 201
            ]);
            exit();
        } catch (Exception $e) {
            echo json_encode(array(
                'message' => $e->getMessage(),
                'status' => 400
            ));
            exit();
        }
    }

    public function logout()
    {
    }

    public function index()
    {
    }

}