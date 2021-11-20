<?php
session_start();
require_once(__DIR__ . '/../libs/UserService.php');
require_once(__DIR__ . '/../libs/UserRepository.php');

if (empty($_SESSION['login_user_id'])) {
  header("HTTP/1.1 302 Found");
  header("Location: /login.php");
  return;
}

$UserService = new UserService(new UserRepository());
$user = $UserService->find_by_id($_SESSION['login_user_id']);

?>

<a href="/truther.php">掲示板に戻る</a>

<h1>設定画面</h1>

<p>
  現在の設定
</p>
<dl> <!-- 登録情報を出力する際はXSS防止のため htmlspecialchars() を必ず使いましょう -->
  <dt>ID</dt>
  <dd><?= htmlspecialchars($user['id']) ?></dd>
  <dt>メールアドレス</dt>
  <dd><?= htmlspecialchars($user['email']) ?></dd>
  <dt>名前</dt>
  <dd><?= htmlspecialchars($user['name']) ?></dd>
  <dt>生年月日</dt>
  <dd><?= htmlspecialchars($user['birthday']) ?></dd>
  <dt>自己紹介</dt>
  <dd><?= htmlspecialchars($user['introduction']) ?></dd>
</dl>

<ul>
  <li><a href="./edit_name.php">名前設定</a></li>
  <li><a href="./icon.php">アイコン設定</a></li>
  <li><a href="./introduction.php">自己紹介文設定</a></li>
  <li><a href="./birthday.php">生年月日設定</a></li>
  <li><a href="./cover_image.php">カバー画像設定</a></li>
</ul>