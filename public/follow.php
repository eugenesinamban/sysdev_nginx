<?php
require_once(__DIR__ . '/libs/FollowService.php');
require_once(__DIR__ . '/libs/FollowRepository.php');
require_once(__DIR__ . '/libs/UserRepository.php');
require_once(__DIR__ . '/libs/UserService.php');
$UserService = new UserService(new UserRepository());
$FollowService = new FollowService(new FollowRepository());

session_start();
$follower = null;
$followee = null;
if (!empty($_SESSION['login_user_id'])) {
    $follower = $UserService->find_by_id($_SESSION['login_user_id']);
}

if (!empty($_GET['followee_id'])) {
    $followee = $UserService->find_by_id($_GET['followee_id']);
}

if (empty($followee)) {
    header("HTTP/1.1 404 Not Found");
    print("そのようなユーザーIDの会員情報は存在しません");
    return;
}

$result = $FollowService->create_relation($follower['id'], $followee['id']);
?>
<?php if ($result): ?>
    <?= htmlspecialchars($followee['name']) ?>さんをフォローしました<br>
<?php else: ?>
    すでにフォロー中<br>
<?php endif; ?>
    <a href="/profile.php?user_id=<?= htmlspecialchars($followee['id']) ?>"><?= htmlspecialchars($followee['name']) ?>さんのプロフィールに戻る</a>
