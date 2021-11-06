<?php

class AuthService {

    public function __construct($UserRepository) {
        $this->UserRepository = $UserRepository;
    }

    public function login(string $email, string $password) {
        if (empty($email) || empty($password)) {
            throw new Exception("Invalid values");
        }

        $user = $this->UserRepository->find_by_email($email);
        
        if (empty($user)) {
            throw new Exception("User not found!");
        }

        if (!password_verify($password, $user['password'])) {
            throw new Exception("Password did not match!");
        }

        return $user;
    }

    public function signup(string $name, string $email, string $password) {
        if (empty($name) || empty($email) || empty($password)) {
            throw new Exception("Invalid values");
        }

        $duplicate = $this->UserRepository->find_by_email($email);

        if (!empty($duplicate)) {
            throw new Execption("User already exists");
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $this->UserRepository->add_user($name, $email, $password_hash);
    }
}