<?php
require_once(__DIR__ . '/Db.php');

class FollowRepository {
    protected $table_name = 'follow_relationship';

    protected function data_store() {
        return Db::getHandle();
    }

    public function create_relation($follower_id, $followee_id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("INSERT INTO $this->table_name (follower_id, followee_id) VALUES (:follower_id, :followee_id);");
        return $sth->execute([
            ':follower_id' => $follower_id,
            ':followee_id' => $followee_id,
        ]);
    }

    public function is_following($follower_id, $followee_id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT * FROM $this->table_name where follower_id = :follower_id AND followee_id = :followee_id LIMIT 1;");
        $sth->execute([
            'follower_id' => $follower_id,
            'followee_id' => $followee_id,
        ]);
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return count($result) > 0;
    }

    public function get_followees($user_id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT fr.follower_id, fr.followee_id, u.* FROM $this->table_name AS fr LEFT JOIN users as u ON u.id = fr.followee_id WHERE fr.follower_id = :follower_id;");
        $sth->execute([
            ':follower_id' => $user_id,
        ]);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function get_followers($user_id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT fr.follower_id, fr.followee_id, u.* FROM $this->table_name AS fr LEFT JOIN users as u ON u.id = fr.follower_id WHERE fr.followee_id = :followee_id;");
        $sth->execute([
            ':followee_id' => $user_id,
        ]);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    
}
