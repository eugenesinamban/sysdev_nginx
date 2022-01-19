<?php
require_once(__DIR__ . '/Db.php');

class MessageRepository {
    protected $table_name = 'messages';

    protected function data_store() {
        return Db::getHandle();
    }

    public function insert($user_id, $message, $image_filename = null) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("INSERT INTO $this->table_name (user_id, message, image_filename) VALUES (:user_id, :message, :image_filename);");
        $sth->execute([
            ':user_id' => $user_id,
            ':message' => $message,
            ':image_filename' => $image_filename
        ]);
    }

    public function get_all_messages_with_users($page) {
        $dbh = $this->data_store();
        $offset = $page <= 1 ? 0 : ($page - 1) * 10;
        $sth = $dbh->prepare("SELECT m.*, u.name AS user_name FROM $this->table_name AS m INNER JOIN users AS u ON m.user_id = u.id ORDER BY m.created_at DESC limit 10 OFFSET :offset;");
        $sth->execute([
            ':offset' => $offset
        ]);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get_user_messages(int $user_id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT m.*, users.name AS user_name, users.icon_filename AS user_icon_filename
                                FROM messages as m INNER JOIN users on m.user_id = users.id
                                WHERE user_id = :user_id
                                ORDER BY m.created_at DESC
        ");
        $sth->execute([
            ':user_id' => $user_id,
        ]);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get_user_and_following_user_messages($user_id, $page) {
        $dbh = $this->data_store();
        $offset = $page <= 1 ? 0 : ($page - 1) * 10;
        $sth = $dbh->prepare("SELECT m.*, u.name as user_name, u.id as user_id 
        FROM messages as m left join users as u on u.id = m.user_id 
        WHERE u.id in 
        (select followee_id from follow_relationship where follower_id = :user_id_1) or u.id = :user_id_2
        ORDER BY m.id DESC
        LIMIT 10 OFFSET :offset;");

        $sth->execute([
            ':user_id_1' => $user_id,
            ':user_id_2' => $user_id,
            ':offset' => $offset,
        ]);

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}
