<?php
// DBに接続
require_once('./libs/UserRepository.php');
require_once('./libs/AuthService.php');
$UserRepository = new UserRepository();
$AuthService = new AuthService($UserRepository);

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  // POSTで email と password が送られてきた場合のみログイン処理をする
  try {
    $user = $AuthService->login($_POST['email'], $_POST['password']);

    session_start();
    // セッションにログインできた会員情報の主キー(id)を設定
    $_SESSION["login_user_id"] = $user['id'];
    
    // ログインが成功したらログイン完了画面にリダイレクト
    header("HTTP/1.1 302 Found");
    header("Location: ./login_finish.php");
    return;

  } catch (Exception $e) {
    header("HTTP/1.1 302 Found");
    header("Location: /login.php?error=1");
    return;
  }

}
?>

<h1>ログイン</h1>

<!-- ログインフォーム -->
<form method="POST">
  <!-- input要素のtype属性は全部textでも動くが、適切なものに設定すると利用者は使いやすい -->
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

<?php if(!empty($_GET['error'])): // エラー用のクエリパラメータがある場合はエラーメッセージ表示 ?>
<div style="color: red;">
  メールアドレスかパスワードが間違っています。
</div>
<?php endif; ?>

会員登録は<a href="./signup.php">こちら</a>