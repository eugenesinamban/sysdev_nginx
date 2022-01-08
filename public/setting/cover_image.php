<?php
session_start();
require_once(__DIR__ . '/../libs/UserService.php');
require_once(__DIR__ . '/../libs/UserRepository.php');
require_once(__DIR__ . '/../libs/ImageService.php');

$UserRepository = new UserRepository();
$UserService = new UserService($UserRepository);
$ImageService = new ImageService($UserRepository);

if (empty($_SESSION['login_user_id'])) {
    header("HTTP/1.1 302 Found");
    header("Location: /login.php");
    return;
}

$user = $UserService->find_by_id($_SESSION['login_user_id']);

if (isset($_POST['image_base64'])) {
    $image_filename = $ImageService->upload($_POST['image_base64']);
    $UserService->update_cover_image($user['id'], $image_filename);
    header("HTTP/1.1 302 Found");
    header("Location: ./cover_image.php");
    return;
}

?>
<a href="./index.php">設定一覧に戻る</a>
<h1>カバー画像</h1>

<div>
  <?php if(empty($user['cover_image_filename'])): ?>
  現在未設定
  <?php else: ?>
  <img src="/image/<?= $user['cover_image_filename'] ?>"
    style="height: 10em; width: 100%; object-fit: cover;">
  <?php endif; ?>
</div>

<!-- フォームのPOST先はこのファイル自身にする -->
<form method="POST" action="./cover_image.php">
  <div style="margin: 1em 0;">
    <input type="file" accept="image/*" name="image" id="imageInput">
  </div>
  <input id="imageBase64Input" type="hidden" name="image_base64"><!-- base64を送る用のinput (非表示) -->
  <canvas id="imageCanvas" style="display: none;"></canvas><!-- 画像縮小に使うcanvas (非表示) -->
  <button type="submit">アップロード</button>
</form>

<hr>

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
