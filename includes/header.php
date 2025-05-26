<?php
session_start();
?>
<header class="header">
    <div class="frame5703">
        <p class="frame5703tum">Тюмень</p>
        <div class="frame5702">
            <div class="frame5616">
                <p class="fabrika">
                    <a href="/index.php">Fabrika</a>
                </p>
                <div class="frame5701">
                    <p class="frame5701otidei">От идеи до воплощения</p>
                </div>

            </div>
            <div class="nav-wrapper">
                <div class="burger" id="burger">&#9776;</div>
                <div class="frame5618" id="navMenu">
                    <p class="frame5618text">Каталог</p>
                    <p class="frame5618text">О компании</p>
                    <p class="frame5618text">Портфолио</p>
                    <a class="a1" href="/blog.php">
                        <p class="frame5618text">Блог</p>
                    </a>
                    <p class="frame5618text">Контакты</p>


                    <div class="frame5704">
                        <div class="group5628">

                            <p class="group5628text">+7(908)875-04-06</p>
                            <p class="group5628text">+7(3452)748-804</p>
                            <p class="group5628text dis-none"></p>

                        </div>
                        <div class="user-circle1">
                            <a id="openModal"><img class="" src="/assets/images/user-circle1.jpg"></a>
                            <?php if (isset($_SESSION['username'])): ?>
                                <div class="myrow">
                                    <p><?= htmlspecialchars($_SESSION['username']) ?></p>
                                    <form action="logout.php" method="post">
                                        <button type="submit">Выйти</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <p>Войти</p>
                            <?php endif; ?>
                            <!-- Модальное окно -->
                            <div class="modal-overlay" id="modalOverlay">
                                <div class="mymodal">
                                    <div id="modalContent">
                                        Загрузка...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>