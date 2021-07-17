<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();

$table_name = 'visitors_with_ip_and_user_agent';


// save current visitor's details to db
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$query = "INSERT INTO ${table_name} (ip, user_agent) VALUES (:ip, :user_agent)";
$sth = $dbh->prepare($query)->execute([
    "ip" => $ip,
    "user_agent" => $user_agent
]);

// compute offset 
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$offset_value = 10 * ($page - 1);

// fetch data
$query = "SELECT * FROM ${table_name} LIMIT ${offset_value}, 10";
$sth = $dbh->prepare($query);
$sth->execute();
$results = $sth->fetchAll();

// show data
$url = "http://3.230.213.90/pdo/enshu3.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            text-align: center;
        }

        .sub-header {
            margin: auto;
            display: flex;
            width: 80%;
            justify-content: space-between;
        }

        table {
            margin: auto;
            width: 80%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>アクセスログ閲覧</h1>
    <div class="sub-header">
    <?php if ($page > 1) { ?>
        <a href="?page=<?php echo $page - 1;?>">前のページ</a>
    <?php } ?>
    <?php if (count($results) == 10) { ?>
        <a href="?page=<?php echo $page + 1;?>">次のページ</a>
    <?php } ?>
    </div>
    <table border=1>
        <tr>
            <th>
                日時
            </th>
            <th>
                リモートIP
            </th>
            <th>
                UserAgent
            </th>
        </tr>

    <?php
    foreach ($results as $result) {
        ?>
        <tr>
            <td>
            <?php echo $result['created_at'];?>
            </td>
            <td>
            <?php echo $result['ip'];?>
            </td>
            <td>
            <?php echo $result['user_agent'];?>
            </td>
        </tr>
        <?php
    }
    ?>

    </table>    
</body>
</html>