<?php
require_once(__DIR__ . '/libs/FollowService.php');
require_once(__DIR__ . '/libs/FollowRepository.php');
require_once(__DIR__ . '/libs/UserRepository.php');
require_once(__DIR__ . '/libs/UserService.php');
$UserService = new UserService(new UserRepository());
$FollowService = new FollowService(new FollowRepository());

session_start();
$user = null;
if (!empty($_SESSION['login_user_id'])) {
    $user = $UserService->find_by_id($_SESSION['login_user_id']);
}

if (empty($user)) {
    header("HTTP/1.1 404 Not Found");
    print("そのようなユーザーIDの会員情報は存在しません");
    return;
}

$followings = $FollowService->get_followees($user['id']);
?>

<h1>フォローしている一覧</h1>

<ul>
    <?php if (count($followings) > 0): ?>
        <?php foreach($followings as $following): ?>
        <a href="/profile.php?user_id=<?= $following['id'] ?>">
            <?php if(!empty($following['icon_filename'])): // アイコン画像がある場合は表示 ?>
            <img src="/image/<?= $following['icon_filename'] ?>"
            style="height: 2em; width: 2em; border-radius: 50%; object-fit: cover;">
            <?php endif; ?>

            <?= htmlspecialchars($following['name']) ?>
            (ID: <?= htmlspecialchars($following['id']) ?>)
        </a>
        (<?= $following['created_at'] ?>にフォロー)
        <?php endforeach; ?>
    <?php else: ?>
        現在は誰もフォローしていません
    <?php endif; ?>
</ul>