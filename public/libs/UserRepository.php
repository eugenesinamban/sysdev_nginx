<?php
require_once(__DIR__ . '/Db.php');

class UserRepository {

    protected $table_name = 'users';

    protected function data_store() {
        return Db::getHandle();
    }

    public function find_by_email(string $email) {
        $dbh = $this->data_store();
        $sth = $dbh->prepare("SELECT * FROM $this->table_name where email = :email ORDER BY id DESC LIMIT 1;");
        $sth->execute([
            ':email' => $email,
        ]);
        $user = $sth->fetch();
        return $user;
    }

    public function add_user(string $name, string $email, string $password) : void {
        $dbh = $this->data_store();
        
        $sth = $dbh->prepare("INSERT INTO $this->table_name (name, email, password) VALUES (:name, :email, :password);");
        $sth->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
        ]);
        
    }
 }

?>