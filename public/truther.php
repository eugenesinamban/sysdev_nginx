<?php
require_once(__DIR__ . "/libs/MessageService.php");
require_once(__DIR__ . "/libs/ImageService.php");
require_once(__DIR__ . "/libs/UserService.php");
require_once(__DIR__ . "/libs/UserRepository.php");
require_once(__DIR__ . "/libs/MessageRepository.php");

$UserRepository = new UserRepository();
$UserService = new UserService($UserRepository);
$MessageRepository = new MessageRepository();
$MessageService = new MessageService($MessageRepository);
$ImageService = new ImageService();

session_start();
$user = $UserService->find_by_id($_SESSION['login_user_id']);

if (isset($_POST['body']) && !empty($_SESSION['login_user_id'])) {
  // POSTで送られてくるフォームパラメータ body がある かつ ログイン状態 の場合
  
  $image_filename = null;
  if (!empty($_POST['image_base64'])) {
    $image_filename = $ImageService->upload($_POST['image_base64']);
    header("HTTP/1.1 302 Found");
    header("Location: ./icon.php");
    return;
  }

  // insertする
  $MessageService->create_message($user['id'], $_POST['body'], $image_filename);
  header("HTTP/1.1 302 Found");
  header("Location: ./truther.php");
  return;
}


// 投稿データを取得。紐づく会員情報も結合し同時に取得する。
$messages = $MessageService->get_all_messages_with_users();
// bodyのHTMLを出力するための関数を用意する
function bodyFilter (string $body): string
{
    $body = htmlspecialchars($body); // エスケープ処理
    $body = nl2br($body); // 改行文字を<br>要素に変換

    // >>1 といった文字列を該当番号の投稿へのページ内リンクとする (レスアンカー機能)
    // 「>」(半角の大なり記号)は htmlspecialchars() でエスケープされているため注意
    $body = preg_replace('/&gt;&gt;(\d+)/', '<a href="#entry$1">&gt;&gt;$1</a>', $body);

    return $body;
}
?>

<?php if(empty($_SESSION['login_user_id'])): ?>
  投稿するには<a href="/login.php">ログイン</a>が必要です。
<?php else: ?>
  <?= $user['name']?>,おかえりなさい！ (<a href="/setting/index.php">設定画面はこちら</a>)
  <!-- フォームのPOST先はこのファイル自身にする -->
  <form method="POST" action="./truther.php"><!-- enctypeは外しておきましょう -->
    <textarea name="body" required></textarea>
    <div style="margin: 1em 0;">
      <input type="file" accept="image/*" name="image" id="imageInput">
    </div>
    <input id="imageBase64Input" type="hidden" name="image_base64"><!-- base64を送る用のinput (非表示) -->
    <canvas id="imageCanvas" style="display: none;"></canvas><!-- 画像縮小に使うcanvas (非表示) -->
    <button type="submit">送信</button>
  </form>
<?php endif; ?>
<hr>

<?php foreach($messages as $entry): ?>
  <dl style="margin-bottom: 1em; padding-bottom: 1em; border-bottom: 1px solid #ccc;">
    <dt id="entry<?= htmlspecialchars($entry['id']) ?>">
      番号
    </dt>
    <dd>
      <?= htmlspecialchars($entry['id']) ?>
    </dd>
    <dt>
      投稿者
    </dt>
    <a href="/profile.php?user_id=<?=$entry['user_id']?>">
      <dd>
        <?= htmlspecialchars($entry['username']) ?>
        (ID: <?= htmlspecialchars($entry['user_id']) ?>)
      </dd>
    </a>
    <dt>日時</dt>
    <dd><?= $entry['created_at'] ?></dd>
    <dt>内容</dt>
    <dd>
      <?= bodyFilter($entry['message']) ?>
      <?php if(!empty($entry['image_filename'])): ?>
      <div>
        <img src="/image/<?= $entry['image_filename'] ?>" style="max-height: 10em;">
      </div>
      <?php endif; ?>
    </dd>
  </dl>
<?php endforeach ?>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const imageInput = document.getElementById("imageInput");
  imageInput.addEventListener("change", () => {
    if (imageInput.files.length < 1) {
      // 未選択の場合
      return;
    }

    const file = imageInput.files[0];
    if (!file.type.startsWith('image/')){ // 画像でなければスキップ
      return;
    }

    // 画像縮小処理
    const imageBase64Input = document.getElementById("imageBase64Input"); // base64を送るようのinput
    const canvas = document.getElementById("imageCanvas"); // 描画するcanvas
    const reader = new FileReader();
    const image = new Image();
    reader.onload = () => { // ファイルの読み込み完了したら動く処理を指定
      image.onload = () => { // 画像として読み込み完了したら動く処理を指定

        // 元の縦横比を保ったまま縮小するサイズを決めてcanvasの縦横に指定する
        const originalWidth = image.naturalWidth; // 元画像の横幅
        const originalHeight = image.naturalHeight; // 元画像の高さ
        const maxLength = 1000; // 横幅も高さも1000以下に縮小するものとする
        if (originalWidth <= maxLength && originalHeight <= maxLength) { // どちらもmaxLength以下の場合そのまま
            canvas.width = originalWidth;
            canvas.height = originalHeight;
        } else if (originalWidth > originalHeight) { // 横長画像の場合
            canvas.width = maxLength;
            canvas.height = maxLength * originalHeight / originalWidth;
        } else { // 縦長画像の場合
            canvas.width = maxLength * originalWidth / originalHeight;
            canvas.height = maxLength;
        }

        // canvasに実際に画像を描画 (canvasはdisplay:noneで隠れているためわかりにくいが...)
        const context = canvas.getContext("2d");
        context.drawImage(image, 0, 0, canvas.width, canvas.height);

        // canvasの内容をbase64に変換しinputのvalueに設定
        imageBase64Input.value = canvas.toDataURL();
      };
      image.src = reader.result;
    };
    reader.readAsDataURL(file);
  });
});
</script>