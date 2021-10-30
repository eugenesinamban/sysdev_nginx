<?php
// DBに接続
require_once('./libs/UserRepository.php');

$UserRepository = new UserRepository();

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  // POSTで name と email と password が送られてきた場合はDBへの登録処理をする

  // 既に同じメールアドレスで登録された会員が存在しないか確認する
  $user = $UserRepository->find_by_email($_POST['email']);

  if (!empty($user)) {
    // 存在した場合 エラー用のクエリパラメータ付き会員登録画面にリダイレクトする
    header("HTTP/1.1 302 Found");
    header("Location: ./signup.php?duplicate_email=1");
    return;
  }

  $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // insertする
  $UserRepository->add_user($_POST['name'], $_POST['email'], $password_hash);

  // 処理が終わったら完了画面にリダイレクト
  header("HTTP/1.1 302 Found");
  header("Location: ./signup_finish.php");
  return;
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