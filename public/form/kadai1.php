<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();
$messages = [];
$table = 'message_board_one';
// message add request

if (isset($_POST['message'])) {
    $message = trim($_POST['message']);
    $query = "INSERT INTO ${table} (message) VALUES (?);";
    try {
        $sth = $dbh->prepare($query);
        $result = $sth->execute([$message]);
        if ($result) {
            header('Location: ./kadai1.php');
        } else {
            throw new \PDOException("DB ERROR");
        }
        exit;
    } catch(\PDOException $e) {
        echo $e;
        exit;
    }
}

// search request

if (isset($_GET['search'])) {
    $search = "%{$_GET['search']}%";
    $query = "SELECT * FROM ${table} WHERE message LIKE ?";
    $sth = $dbh->prepare($query);
    $sth->execute([$search]);
    $messages = $sth->fetchAll();
} else {
    // get all entries
    $query = "SELECT * FROM ${table};";
    $sth = $dbh->prepare($query);
    $sth->execute();
    $messages = $sth->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kadai 1</title>
</head>
<body>
    <form action="./kadai1.php" method="POST">
    Enter message! <input type="text" name="message"><input type="submit">
    </form>
    <hr>
    <form action="./kadai1.php" method="get">
    Search bar : <input type="text" name="search" value="<?php echo htmlspecialchars($_GET['search']) ?? null ?>"><input type="submit"><?php if(isset($_GET['search'])) {?> <a href="./kadai1.php">Clear Search</a> <?php } ?>
    </form>
    <hr>
    <?php 
    foreach ($messages as $message) {
    ?>
    <dt>日時</dt>
        <dd><?php echo $message['created_at']; ?></dd>
    <dt>内容</dt>
        <dd><?php echo htmlspecialchars($message['message']); ?></dd>
    <hr>
    <?php
    }
    ?>
</body>
</html>