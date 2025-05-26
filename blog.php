<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проект мягкой мебели</title>
    <link rel="stylesheet" href="/assets/css/styles.css?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/bootstrap.min.css') ?>">
    <script src="/assets/js/main.js?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/main.js') ?>"></script>
    <script src="/assets/js/search.js?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/search.js') ?>"></script>
    <script src="/assets/js/bootstrap.bundle.min.js?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/bootstrap.bundle.min.js') ?>"></script>

</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="main">

        <div class="frame5699">

            <div class="frame55452">
                <div class="frame48095787">
                    <p class="frame48095787text1">Новости</p>
                    <p class="frame48095787text2">Все статьи ></p>
                </div>
                <?php
                require 'db.php';

                $news = [];
                $result = $pdo->prepare("SELECT * FROM news ORDER BY publish_date DESC LIMIT 5");
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $news[] = $row;
                }
                ?>

                <div class="frame48095786">
                    <?php foreach ($news as $item): ?>
                        <div class="frame48095782">
                            <div class="maskgroup3">
                                <img class="maskgroup3img" src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                            </div>

                            <div class="blog1">
                                <div class="frame3">
                                    <div class="frame5540">
                                        <p class="frame5540text1"><?= date("d.m.Y", strtotime($item['publish_date'])) ?> &nbsp;
                                        <p>
                                        <p class="frame5540text2">Чтение: <?= htmlspecialchars($item['read_time']) ?>
                                        <p>
                                    </div>
                                    <a href="blogone.php?id=<?= $item['id'] ?>" class="news-link">
                                        <h3 class="frame3text1"><?= htmlspecialchars($item['title']) ?></h3>
                                        <p class="frame3text2"><?= htmlspecialchars($item['summary']) ?></p>
                                    </a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>