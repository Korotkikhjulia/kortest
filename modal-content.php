<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <title>Вход / Регистрация</title>
    <link rel="stylesheet" href="/assets/css/styles.css?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/styles.css') ?>">
</head>

<body class="bodymodal">
    <div class="form-wrapper">
        <div id="login-form">
            <div class="frame48095777">
                <h2 class="frame48095777text">Войти</h2>
                <button class="modal-close" type="button"><p>&times;</p></button>
            </div>
            <div class="frame48095775">
                <form action="login.php" method="POST" class="frame981">
                    <input type="text" name="username" placeholder="Логин" required />
                    <input type="password" name="password" placeholder="Пароль" required />
                    <button type="submit" class="submit">
                        <p>Войти</p>
                    </button>
                </form>
                <p class="frame48095775text">Нет аккаунта? <a href="#" onclick="toggleForms()">Зарегистрироваться</a></p>
            </div>
        </div>

        <div id="register-form" style="display: none;">
            <div class="frame48095777">
                <h2 class="frame48095777text">Регистрация</h2>
                <button class="modal-close" type="button">&times;</button>
            </div>
            <div class="frame48095775">
                <form id="regForm" action="register.php" class="frame981" method="POST" onsubmit="return validateRegister()">
                    <input type="text" name="username" placeholder="Имя" required />
                    <input type="text" name="user" placeholder="Фамилия" required />
                    <input type="text" name="phone" placeholder="Телефон" required />
                    <input type="password" name="password" placeholder="Пароль" required />
                    <div class="frame974"><input type="checkbox" name="terms" required />
                        <p>Соглашаюсь с условиями обработки
                            персональных данных</p>
                    </div>
                    <button type="submit" class="submit">
                        <p>Зарегистрироваться</p>
                    </button>
                </form>
                <p>Уже есть аккаунт? <a href="#" onclick="toggleForms()">Авторизоваться</a></p>
            </div>
        </div>
    </div>


    <script src="/assets/js/main.js?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/main.js') ?>"></script>
</body>

</html>