<?php
session_start();
?>
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
        <div class="frame5705">
            <div class="frame5692">
                <div class="carousel">
                    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src='assets/images/slide1.jpg' class="carouselimg d-block w-100" alt="...">
                                <div class="carousel-caption d-flex">
                                    <h3 class="carousel-text">Перетяжка мягкой мебели</h3>
                                    <button class="carouselbtn">Подробнее</button>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/slide2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/slide3.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/slide4.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="frame5699">
            <div class="frame56991">
                <input type="text" id="product-search" placeholder="Поиск продуктов..." autocomplete="off" class="frame5693">
                <div id="search-results"></div>
            </div>
            <div class="frame5695">
                <p class="frame5695text">Готовые решения</p>
                <?php
                require 'db.php';

                $stmt = $pdo->query("SELECT * FROM products");
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="frame5694">
                    <?php foreach ($products as $product): ?>
                        <div class="frame5626">
                            <div class="maskgroup">
                                <img class="maskgroupimg" src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            </div>
                            <div class="frame5700">
                                <p class="frame5700text1">
                                    <?= htmlspecialchars($product['subtitle']) ?><br>«<?= htmlspecialchars($product['name']) ?>»</p>
                                <p class="frame5700text2"><?= number_format($product['price'], 0, '', ' ') ?> Р.</p>
                                <div class="frame11">
                                    <p class="frame11text">В корзину</p>

                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="frame5698">
            <div class="frame5697">
                <div class="frame5447">
                    <p class="frame5447text1">О компании</p>
                    <p class="frame5447text2">Более 7 лет «Fabrika» радует своих клиентов, воплощая идеи в уникальную мягкую мебель изготовленную
                        по индивидуальному заказу. Соединяя передовые технологии и многолетний опыт,
                        мы не просто создаем широкий модельный ряд или восстанавливаем износившуюся мебель,
                        но и вдыхаем новую жизнь в ваш интерьер! А получить предворительную оценку стоимости можно просто прислав проект,
                        любым удобным для вас образом, или приехав к нам в офис.</p>

                </div>
                <div class="maskgroup2">
                    <img class="maskgroup2img" src="/assets/images/img2.jpg">

                </div>
            </div>
        </div>

        <div class="frame914">
            <div class="frame984">
                <div class="frame983">
                    <p class="frame983text1">Оставьте заявку</p>
                    <p class="frame983text2">Мы свяжемся с вами и расскажем подробнее обо всех видах услуг</p>
                </div>
                <div class="frame982">
                    <div class="frame981">
                        <div class="frame975">
                            <p class="frame975text">
                                Как вас зовут?
                            </p>
                        </div>
                        <div class="frame976">
                            <p class="frame976text">
                                +7 (_____) _____ ___ ___
                            </p>
                        </div>
                        <div class="frame977">
                            <p class="frame977text">
                                Email
                            </p>
                        </div>
                    </div>
                    <div class="frame978">
                        <p class="frame978text">Сообщение</p>
                    </div>
                    <div class="frame979">
                        <div class="frame974">
                            <p class="frame974text">Соглашаюсь с условиями обработки персональных данных</p>
                        </div>
                        <div class="frame4">
                            <p class="frame4text">Отправить</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="frame5545">
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
                                <h3 class="frame3text1"><?= htmlspecialchars($item['title']) ?></h3>
                                <p class="frame3text2"><?= htmlspecialchars($item['summary']) ?></p>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </main>

    <?php
    include 'includes/footer.php'; 
    ?>
</body>