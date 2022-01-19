<?php
require_once(__DIR__ . "/libs/UserService.php");
require_once(__DIR__ . "/libs/UserRepository.php");
require_once(__DIR__ . '/libs/MessageRepository.php');
require_once(__DIR__ . '/libs/MessageService.php');
$UserService = new UserService(new UserRepository());
$MessageService = new MessageService(new MessageRepository());
session_start();

function bodyFilter (string $body): string
{
    $body = htmlspecialchars($body); // エスケープ処理
    $body = nl2br($body); // 改行文字を<br>要素に変換

    // >>1 といった文字列を該当番号の投稿へのページ内リンクとする (レスアンカー機能)
    // 「>」(半角の大なり記号)は htmlspecialchars() でエスケープされているため注意
    $body = preg_replace('/&gt;&gt;(\d+)/', '<a href="#entry$1">&gt;&gt;$1</a>', $body);

    return $body;
}

if (empty($_SESSION['login_user_id'])) { // 非ログインの場合利用不可
    header("HTTP/1.1 302 Found");
    header("Location: /login.php");
    return;
}

$user = $UserService->find_by_id($_SESSION['login_user_id']);
$page = !empty($_GET['page']) ? intval($_GET['page']) : 1;
$select_sth = $MessageService->get_user_and_following_user_messages($user['id'], $page);

$result_entries = [];
foreach ($select_sth as $entry) {
  $result_entry = [
    'id' => $entry['id'],
    'user_name' => $entry['user_name'],
    'user_profile_url' => '/profile.php?user_id=' . $entry['user_id'],
    'user_icon_file_url' => empty($entry['user_icon_filename']) ? '' : ('/image/' . $entry['user_icon_filename']),
    'body' => bodyFilter($entry['message']),
    'image_file_url' => empty($entry['image_filename']) ? '' : ('/image/' . $entry['image_filename']),
    'created_at' => $entry['created_at'],
  ];
  $result_entries[] = $result_entry;
}

header("HTTP/1.1 200 OK");
header("Content-Type: application/json");
print(json_encode(['entries' => $result_entries]));
