<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <title>Вход / Регистрация</title>
    <link rel="stylesheet" href="/assets/css/styles.css?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/styles.css') ?>">
</head>

<?php
$error = isset($_GET['error']) && $_GET['error'] == 1;
$error = isset($_GET['error']) && $_GET['error'] == 2;
?>

<body class="bodymodal">
    <div class="mymodal">
        <div id="modalContent">
            <div class="form-wrapper">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="myrow">
                        <p><?= htmlspecialchars($_SESSION['username']) ?></p>
                        <form action="logout.php" method="post">
                            <button type="submit" class="mybtn">Выйти</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div id="login-form">
                        <div class="closediv">
                            <button class="modal-close" type="button"> &times; </button>
                        </div>
                        <div class="frame48095777">
                            <h2 class="frame48095777text">Войти</h2>
                        </div>
                        <div class="frame48095775">
                            <form id="loginForm" action="login.php" method="POST" class="frame9811" onsubmit="return validateLogin()">
                                <input type="text" class="in" name="username" placeholder="Логин" />
                                <span class="error-icon username-icon" style="display: none;">❗</span>
                                <input type="password" class="in" name="password" placeholder="Пароль" />
                                <span class="error-icon password-icon" style="display: none;">❗</span>
                                <div class="error-message password-error" style="display:none;"></div>
                                <button type="submit" class="submit btncolor">
                                    <p>Войти</p>
                                </button>
                            </form>
                            <p class="frame48095775text">Нет аккаунта? <a href="#" onclick="toggleForms()">Зарегистрироваться</a></p>
                        </div>
                    </div>

                    <div id="register-form" style="display: none;">
                        <div class="closediv">
                            <button class="modal-close" type="button"> &times; </button>
                        </div>
                        <div class="frame48095777">
                            <h2 class="frame48095777text">Регистрация</h2>
                        </div>
                        <div class="frame48095775">
                            <form id="regForm" action="register.php" class="frame9811" method="POST" onsubmit="return validateRegister()">
                                <input type="text" class="in" name="username" placeholder="Имя"/>
                                <span class="error-icon username-icon" style="display: none;">❗</span>
                                <input type="text" class="in" name="user" placeholder="Фамилия"/>
                                <span class="error-icon user-icon" style="display: none;">❗</span>
                                <input type="text" class="in" name="phone" placeholder="Телефон"/>
                                <span class="error-icon phone-icon" style="display: none;">❗</span>
                                <input type="password" class="in" name="password" placeholder="Пароль"/>
                                <span class="error-icon password-icon" style="display: none;">❗</span>
                                <div class="frame974"> <label class="custom-checkbox2">
                                        <input type="checkbox" name="terms"  />
                                        <span class="checkmark2"></span>
                                        <span class="checkbox-text2">Соглашаюсь с условиями обработки персональных данных</span>
                                    </label>
                                </div>
                                <button type="submit" class="submit btncolor">
                                    <p>Зарегистрироваться</p>
                                </button>
                            </form>
                            <p>Уже есть аккаунт? <a href="#" onclick="toggleForms()">Авторизоваться</a></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="/assets/js/main.js?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/main.js') ?>"></script>
</body>


</html>