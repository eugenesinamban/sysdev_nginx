<?php
class MessageService {
    public function __construct($MessageRepository) {
        $this->MessageRepository = $MessageRepository;
    }

    public function create_message($user_id, $message, $image_filename = null) {
        $this->MessageRepository->insert($user_id, $message, $image_filename);
    }

    public function get_all_messages_with_users($page) {
        return $this->MessageRepository->get_all_messages_with_users($page);
    }

    public function get_user_messages(int $user_id) {
        if (empty($user_id)) {
            throw new Exception('Invalid values passed!');
        }
        return $this->MessageRepository->get_user_messages($user_id);
    }

    public function get_user_and_following_user_messages(int $user_id, int $page) {
        if (empty($user_id) || empty($page)) {
            throw new Exception('Invalid values passed!');
        }
        return $this->MessageRepository->get_user_and_following_user_messages($user_id, $page);
    }
}
