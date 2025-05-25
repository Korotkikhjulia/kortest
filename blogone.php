<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
$stmt->execute([$id]);
$newsItem = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$newsItem) {
    echo "Новость не найдена.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($newsItem['title']) ?></title>
    <link rel="stylesheet" href="/assets/css/styles.css?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/styles.css') ?>">
    <script src="/assets/js/main.js?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/main.js') ?>"></script>
</head>
<body>
<?php include 'includes/header.php'; ?>

<main class="mainblogone">
    <div class="frame5709">
        <div class="frame5708">
            <div class="frame5707">
                <div class="frame5706">
                    <div class="frame5679">
                        <p class="frame5679text1">Блог</p>
                        <p class="frame5679text2">></p>
                        <p class="frame5679text3"><?= htmlspecialchars($newsItem['title']) ?></p>
                    </div>
                    <div class="maskgroup4">
                        <img class="maskgroup4img" src="<?= htmlspecialchars($newsItem['full_image']) ?>" alt="">
                    </div>
                </div>
                <div class="title">
                    <div class="frame5540">
                        <p class="frame5540text"><?= date("d.m.Y", strtotime($newsItem['publish_date'])) ?></p>
                        <div class="frame5546">
                            <p class="frame5546text"><?= htmlspecialchars($newsItem['read_time']) ?></p>
                        </div>
                    </div>
                    <p class="titletext1"><?= htmlspecialchars($newsItem['title']) ?></p>
                    <p class="titletext2"><?= nl2br(htmlspecialchars($newsItem['content'])) ?></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
 
   