<?php
class FollowService {
    public function __construct($FollowRepository) {
        $this->FollowRepository = $FollowRepository;
    }

    public function get_followees($user_id) {
        return $this->FollowRepository->get_followees($user_id);
    }

    public function get_followers($user_id) {
        return $this->FollowRepository->get_followers($user_id);
    }
    
    public function create_relation($follower_id, $followee_id) {
        if ($this->is_following($follower_id, $followee_id)) {
            return false;
        } else {
            return $this->FollowRepository->create_relation($follower_id, $followee_id);
        }
    }

    public function is_following($follower_id, $followee_id) {
        return $this->FollowRepository->is_following($follower_id, $followee_id);
    }
}
