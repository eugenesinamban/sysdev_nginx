<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();

$table_name = 'visitors_with_ip_and_user_agent';

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// save current visitor's details to db
$query = "INSERT INTO ${table_name} (ip, user_agent) VALUES (:ip, :user_agent)";
$sth = $dbh->prepare($query)->execute([
    "ip" => $ip,
    "user_agent" => $user_agent
]);

// fetch data
$query = "SELECT * FROM ${table_name}";
$sth = $dbh->prepare($query);
$sth->execute();
$results = $sth->fetchAll();

// show data
?>
<dl>
    <?php
    foreach ($results as $result) {
        ?>
            <dt>日時</dt>
                <dd><?php echo $result['created_at'];?></dd>   
            <dt>IP</dt> 
                <dd><?php echo $result['ip'];?></dd>
            <dt>UserAgent</dt>
                <dd><?php echo $result['user_agent'];?></dd>
        <hr>
        <?php
    }
    ?>
</dl>