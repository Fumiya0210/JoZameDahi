<?php 
require_once('../config.php');
require_once('../functions.php');

$dbh = connectDb();

$entries = array();

$sql = "select * from entries order by created desc";

foreach ($dbh->query($sql) as $row) {
    array_push($entries, $row);
}

var_dump($entries); exit;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"> <title>お問合せ一覧</title>
</head>
<body>
<h1>データ一覧</h1>
<p><?php echo count($entries); ?>件あります。</p>
<li><?php echo h($entry['email']); ?>
<a href="edit.php?id=<?php echo h($entry['id']); ?>">[編集]</a>
<span class="deleteLink" data-id="<?php echo h($entry['id']); ?>">[削除]</span>
</li>
<?php foreach ($entries as $entry) : ?>
<?php endforeach; ?></ul>
</ul>
<style>deleteLink { color: blue; cursor: pointer; }</style>
<p><a href="<?php echo SITE_URL; ?>">お問合せフォームへ</a></p>
