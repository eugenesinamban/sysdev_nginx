<?php
require_once(__DIR__ . '/Db.php');

class MessageRepository {
    protected $table_name = 'message_board';

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

    public function get_all_messages_with_users() {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT mb.*, u.name AS username FROM $this->table_name AS mb INNER JOIN users AS u ON mb.user_id = u.id ORDER BY mb.created_at DESC;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get_user_messages(int $user_id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT mb.*, users.name AS user_name, users.icon_filename AS user_icon_filename
                                FROM message_board as mb INNER JOIN users on mb.user_id = users.id
                                WHERE user_id = :user_id
                                ORDER BY mb.created_at DESC
        ");
        $sth->execute([
            ':user_id' => $user_id,
        ]);
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}