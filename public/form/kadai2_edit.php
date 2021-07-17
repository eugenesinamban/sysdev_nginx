<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();
$messages = [];
$table = 'message_board_two';

if (isset($_POST['message'])) {
    $message = trim($_POST['message']);
    $id = intval($_POST['id']);
    // var_dump($message, $id);
    // exit;
    $query = "UPDATE $table SET message = ? WHERE id = ?";

    $sth = $dbh->prepare($query);
    $sth->execute([$message, $id]);
    header('location: ./kadai2.php');
    exit;
} elseif (isset($_GET['message_id'])) {
    $query = "SELECT * FROM $table WHERE id = ?";
    $sth = $dbh->prepare($query);
    $sth->execute([$_GET['message_id']]);
    $message = $sth->fetch();

    if ($message === null) {
        header('location: ./kadai2.php');
        exit;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kadai 2</title>
</head>
<body>
    <form method="post" action="./kadai2_edit.php?edit_entry_id=<?php echo $message['id']; ?>">
    <?php echo "You are about to edit message id " , htmlspecialchars($message['id']), ". Posted at: ", htmlspecialchars($message['created_at']),"; ";?><br>
    <input type="text" name="message" value="<?php echo htmlspecialchars($message['message']);?>">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($message['id']); ?>">
    <input type="submit">
    </form>
</body>
</html>