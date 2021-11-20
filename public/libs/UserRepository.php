<?php
require_once(__DIR__ . '/Db.php');

class UserRepository {

    protected $table_name = 'users';

    protected function data_store() {
        return Db::getHandle();
    }

    public function find_by_id($id) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("SELECT * FROM $this->table_name where id = :id;");
        $sth->execute([
            ':id' => $id,
        ]);
        $user = $sth->fetch();
        return $user;
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

    public function update_icon(string $id, string $image_filename) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("UPDATE $this->table_name SET icon_filename = :icon_filename WHERE id = :id");
        $sth->execute([
            ':icon_filename' => $image_filename,
            ':id' => $id,
        ]);
    }

    public function update_cover_image(string $id, string $image_filename) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("UPDATE $this->table_name SET cover_image_filename = :image_filename where id = :id");
        $sth->execute([
            ':image_filename' => $image_filename,
            ':id' => $id,
        ]);
    }

    public function update_introduction(string $id, string $introduction) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("UPDATE $this->table_name SET introduction = :introduction WHERE id = :id;");
        $sth->execute([
            ':introduction' => $introduction,
            ':id' => $id,
        ]);
    }

    public function update_name(int $id, string $name) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("UPDATE $this->table_name SET name = :name where id = :id;");
        $sth->execute([
            ':name' => $name,
            ':id' => $id,
        ]);
    }

    public function update_birthday(int $id, string $date) {
        $dbh = $this->data_store();

        $sth = $dbh->prepare("UPDATE $this->table_name SET birthday = :date where id = :id;");
        $sth->execute([
            ':date' => $date,
            ':id' => $id,
        ]);
    }
 }

?>