<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();
$messages = [];
$table = 'message_board_two';

if (isset($_POST['message'])) {
    $message = trim($_POST['message']);
    $query = "INSERT INTO ${table} (message) VALUES (?);";
    try {
        $sth = $dbh->prepare($query);
        $result = $sth->execute([$message]);
        if ($result) {
            header('Location: ./kadai2.php');
        } else {
            throw new \PDOException("DB ERROR");
        }
        exit;
    } catch(\PDOException $e) {
        echo $e;
        exit;
    }
}

    $query = "SELECT * FROM ${table};";
    $sth = $dbh->prepare($query);
    $sth->execute();
    $messages = $sth->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kadai 2</title>
</head>
<body>
    <form action="./kadai2.php" method="GET">
        Enter message! <input type="text" name="message"><input type="submit">
    </form>
    <hr>
    <?php foreach ($messages as $message):?>
        <dt>日時</dt>
            <dd><?php echo $message['created_at']; ?></dd>
        <dt>内容</dt>
            <dd><?php echo htmlspecialchars($message['message']); ?></dd>
        <a href="./kadai2_edit.php?message_id=<?php echo $message['id'];?>">Edit</a>
        <hr>
    <?php endforeach;?>
</body>
</html>