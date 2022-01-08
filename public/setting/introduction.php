<?php
session_start();
require_once(__DIR__ . '/../libs/UserService.php');
require_once(__DIR__ . '/../libs/UserRepository.php');

$UserService = new UserService(new UserRepository());

if (empty($_SESSION['login_user_id'])) {
    header("HTTP/1.1 302 Found");
    header("Location: /login.php");
    return;
}

$user = $UserService->find_by_id($_SESSION['login_user_id']);

if (isset($_POST['introduction'])) {
    $UserService->update_introduction($user['id'], $_POST['introduction']);
    header("HTTP/1.1 302 Found");
    header("Location: ./introduction.php?success=1");
    return;
}
?>

<a href="./index.php">設定一覧に戻る</a>

<h1>自己紹介</h1>

<form method="POST">
    <textarea name="introduction" maxlength="1000"><?= htmlspecialchars($user['introduction']);?></textarea>
    <input type="submit">
</form>
<?php if(!empty($_GET['success'])): ?>
<div>
  自己紹介文の設定処理が完了しました。
</div>
<?php endif; ?>
