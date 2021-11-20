<?php
require_once(__DIR__ . '/libs/UserRepository.php');
require_once(__DIR__ . '/libs/UserService.php');
require_once(__DIR__ . '/libs/MessageRepository.php');
require_once(__DIR__ . '/libs/MessageService.php');
$UserService = new UserService(new UserRepository());
$MessageService = new MessageService(new MessageRepository());

$user = null;
if (!empty($_GET['user_id'])) {
    $user = $UserService->find_by_id($_GET['user_id']);
}

if (empty($user)) {
  header("HTTP/1.1 404 Not Found");
  print("そのようなユーザーIDの会員情報は存在しません");
  return;
}

$messages = $MessageService->get_user_messages($user['id']);
?>

<?php if(!empty($user['cover_image_filename'])): ?>
  <img src="/image/<?= $user['cover_image_filename'] ?>"
    style="height: 15em; width: 100%; object-fit: cover;">
<?php endif ?>

<h1><?= htmlspecialchars($user['name']) ?> さん のプロフィール</h1>

<div>
  <?php if(empty($user['icon_filename'])): ?>
  現在未設定
  <?php else: ?>
  <img src="/image/<?= $user['icon_filename'] ?>"
    style="height: 5em; width: 5em; border-radius: 50%; object-fit: cover;">
  <?php endif; ?>
</div>
<div>
  生年月日：<?= htmlspecialchars($user['birthday']) ?><br>

  <?php 
    $birthday = DateTime::createFromFormat('Y-m-d', $user['birthday']);
    $today = new DateTime('now');
  ?>
  <?= $today->diff($birthday)->y ?>歳
</div>
<div>
  自己紹介：<?= nl2br(htmlspecialchars($user['introduction'])) ?>
</div>

<hr>

<?php foreach($messages as $message): ?>
  <dl style="margin-bottom: 1em; padding-bottom: 1em; border-bottom: 1px solid #ccc;">
    <dt>日時</dt>
    <dd><?= $message['created_at'] ?></dd>
    <dt>内容</dt>
    <dd>
      <?= htmlspecialchars($message['message']) ?>
      <?php if(!empty($message['image_filename'])): ?>
      <div>
        <img src="/image/<?= $message['image_filename'] ?>" style="max-height: 10em;">
      </div>
      <?php endif; ?>
    </dd>
  </dl>
<?php endforeach ?>