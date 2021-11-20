<?php

class UserService {
    public function __construct($UserRepository) {
        $this->UserRepository = $UserRepository; 
    }

    public function find_by_id($id) {
        return $this->UserRepository->find_by_id($id);
    }

    public function update_icon(int $id, string $image_filename) {
        if (empty($image_filename)) {
            throw new Exception('Invalid values!');
        }
        $this->UserRepository->update_icon($id, $image_filename);
    }
    
    public function update_cover_image(int $id, string $image_filename) {
        if (empty($image_filename)) {
            throw new Exception('Invalid values!');
        }
        $this->UserRepository->update_cover_image($id, $image_filename);
    }

    public function update_introduction(int $id, string $introduction) {
        if (empty($introduction)) {
            throw new Exception('Invalid values!');
        }
        $this->UserRepository->update_introduction($id, $introduction);
    }

    public function update_name(int $id, string $name) {
        if (empty($name)) {
            throw new Exception('Invalid values!');
        }
        $this->UserRepository->update_name($id, $name);
    }

    public function update_birthday(int $id, string $date) {
        if (empty($date)) {
            throw new Exception('Invalid values!');
        }
        $this->UserRepository->update_birthday($id, $date);
    }
}