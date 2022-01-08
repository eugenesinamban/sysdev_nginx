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

if (isset($_POST['birthday'])) {
    $UserService->update_birthday($user['id'], $_POST['birthday']);
    header("HTTP/1.1 302 Found");
    header("Location: ./birthday.php?success=1");
    return;
}
?>
<a href="./index.php">設定一覧に戻る</a>
<h1>生年月日</h1>

<form method="POST">
    <input type="date" name="birthday" value=<?= htmlspecialchars($user['birthday']) ?>>
    <input type="submit">
</form>
<?php if(!empty($_GET['success'])): ?>
<div>
  生年月日の変更処理が完了しました。
</div>
<?php endif; ?>
