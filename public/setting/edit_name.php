<?php
session_start();
require_once(__DIR__ . '/../libs/UserRepository.php');
require_once(__DIR__ . '/../libs/UserService.php');

if (empty($_SESSION['login_user_id'])) {
  header("HTTP/1.1 302 Found");
  header("Location: /login.php");
  return;
}

$UserService = new UserService(new UserRepository());

$user = $UserService->find_by_id($_SESSION['login_user_id']);

if (isset($_POST['name'])) {
  // フォームから name が送信されてきた場合の処理

  // ログインしている会員情報のnameカラムを更新する
  $UserService->update_name($_SESSION['login_user_id'], $_POST['name']);
  // 成功したら成功したことを示すクエリパラメータつきのURLにリダイレクト
  header("HTTP/1.1 302 Found");
  header("Location: ./edit_name.php?success=1");
  return;
}
?>
<a href="./index.php">設定一覧に戻る</a>
<h1>名前変更</h1>
<form method="POST">
  <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">
  <button type="submit">決定</button>
</form>

<?php if(!empty($_GET['success'])): ?>
<div>
  名前の変更処理が完了しました。
</div>
<?php endif; ?>
