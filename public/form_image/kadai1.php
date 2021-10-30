<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();
$table = 'message_board_one';
$image_dir = '/var/www/public/image/';

// message add request
if (isset($_POST['message'])) {

    $image_filename = null;
    if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
        if (preg_match('/^image\//', $_FILES['image']['type']) !== 1 && !exif_imagetype($_FILES['image']['tmp_name'])) {
            // アップロードされたものが画像ではなかった場合
            header("HTTP/1.1 302 Found");
            header("Location: ./kadai1.php");
            exit;
        }
        $pathinfo = pathinfo($_FILES['image']['name']);
        $extension = $pathinfo['extension'];

        $image_filename = strval(time()) . bin2hex(random_bytes(25)) . '.' . $extension;
        $filepath =  $image_dir . $image_filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
    }
    
    $message = trim($_POST['message']);
    $query = "INSERT INTO ${table} (message, image_filename) VALUES (:message, :image_filename);";
    try {
        $sth = $dbh->prepare($query);
        $result = $sth->execute([
            ':message' => $message,
            ':image_filename' => $image_filename,
        ]);
        if ($result) {
            header("HTTP/1.1 302 Found");
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

$messages = [];
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
    <title>Kadai 1</title>
</head>
<body>
    <form action="./kadai1.php" method="POST" enctype="multipart/form-data">
    Enter message! <input type="text" name="message"><br>
    Image: <input type="file" onchange="validateSize(this)" name="image"><br>
    <input type="submit" id="submit-button">
    </form>
    <hr>
    <?php 
    foreach ($messages as $message) {
    ?>
    <dt>日時</dt>
        <dd><?php echo $message['created_at']; ?></dd>
    <dt>内容</dt>
        <dd><?php echo htmlspecialchars($message['message']); ?></dd>
        <?php if (!empty($message['image_filename'])): ?>
        <dd><img src="../image/<?php echo htmlspecialchars($message['image_filename']);?>"></dd>
        <?php endif; ?>
    <hr>
    <?php
    }
    ?>
    <script>
        function validateSize(input) {
            const button = document.getElementById('submit-button')
            const fileSize = input.files[0].size / 1024 / 1024; // in MiB
            if (fileSize > 5) {
                alert('File size exceeds 5 MB');
                button.disabled = true
            } else {
                button.disabled = false
            }
        }
    </script>
</body>
</html>