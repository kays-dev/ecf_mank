<?php

require_once __DIR__ . '/../models/repositories/UserRepository.php';

class AuthController{

    private UserRepository $userRepository;

    public function __construct(){
        $this->userRepository = new UserRepository();
    }

    public function auth(){
        require_once __DIR__ . '/../views/authViews/authentification.php';
    }

    public function login(){
        $email= filter_input(INPUT_POST, 'email');
        $motdepasse= filter_input(INPUT_POST, 'password');

        $admin = $this->userRepository->getUser($email);

        if(password_verify($motdepasse, $admin->getMotDePasse())){
            $_SESSION['user_id']= $admin->getId();

            header('Location: ?action=dashboard');

            exit;
        } else {
            header('Location: ?action=406');
            exit;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        header('Location: ?action=auth');
        exit;
    }

}