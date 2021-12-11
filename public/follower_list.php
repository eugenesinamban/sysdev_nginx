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

$followers = $FollowService->get_followers($user['id']);

?>
<h1>フォロワー一覧</h1>

<ul>
    <?php if (count($followers) > 0): ?>
        <?php foreach($followers as $follower): ?>
        <a href="/profile.php?user_id=<?= $follower['id'] ?>">
            <?php if(!empty($follower['icon_filename'])): // アイコン画像がある場合は表示 ?>
            <img src="/image/<?= $follower['icon_filename'] ?>"
            style="height: 2em; width: 2em; border-radius: 50%; object-fit: cover;">
            <?php endif; ?>

            <?= htmlspecialchars($follower['name']) ?>
            (ID: <?= htmlspecialchars($follower['id']) ?>)
        </a>
        (<?= $follower['created_at'] ?>にフォロー)
        <?php endforeach; ?>
    <?php else: ?>
        現在は誰にもフォローされていません
    <?php endif; ?>
</ul>