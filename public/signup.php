<?php
// DBに接続
require_once('./libs/UserRepository.php');
require_once('./libs/AuthService.php');

$UserRepository = new UserRepository();
$AuthService = new AuthService($UserRepository);

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  // POSTで name と email と password が送られてきた場合はDBへの登録処理をする
  try {
    $AuthService->signup($_POST['name'], $_POST['email'], $_POST['password']);
    header("HTTP/1.1 302 Found");
    header("Location: ./signup_finish.php");
    return;
  } catch (Exception $e) {
    header("HTTP/1.1 302 Found");
    header("Location: ./signup.php?duplicate_email=1");
    return;
  }
}
?>

<h1>会員登録</h1>

<!-- 登録フォーム -->
<form method="POST">
  <!-- input要素のtype属性は全部textでも動くが、適切なものに設定すると利用者は使いやすい -->
  <label>
    名前:
    <input type="text" name="name">
  </label>
  <br>
  <label>
    メールアドレス:
    <input type="email" name="email">
  </label>
  <br>
  <label>
    パスワード:
    <input type="password" name="password" min="6" autocomplete="new-password">
  </label>
  <br>
  <button type="submit">決定</button>
</form>

<?php if(!empty($_GET['duplicate_email'])): ?>
<div style="color: red;">
  入力されたメールアドレスは既に使われています。
</div>
<?php endif; ?>