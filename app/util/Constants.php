<?php

namespace Util;

class Constants
{
    /*
     * Pages
     */
    const INDEX_PAGE_LOCATION = '/index.php';
    const LOGIN_PAGE_LOCATION = '/resources/views/login.php';
    const REGISTRATION_PAGE_LOCATION = '/resources/views/registration.php';
    const LOGOUT_PAGE_LOCATION = '/resources/views/logout.php';

    /*
     * Headers values
     */
    const REDIRECT_TO_INDEX_HEADER = 'Location:/index.php';
    const REDIRECT_TO_LOGIN_HEADER = 'Location:/resources/views/login.php';
    const REDIRECT_TO_REGISTRATION_HEADER = 'Location:/resources/views/registration.php';
    const REDIRECT_TO_ERROR_HEADER = 'Location:/resources/views/errors/error.php';

    /*
     * Registration form error messages
     */
    const ERROR_EMPTY_USERNAME = 'Пустое поле Username.';
    const ERROR_USERNAME_INCORRECT_SYMBOLS = 'Username содержит недопустимые символы.';
    const ERROR_USERNAME_EXISTS = 'Никнейм пользователя уже существует. Попробуйте выбрать какое то другое.';

    const ERROR_EMPTY_EMAIL = 'Пустое поле email-а.';
    const ERROR_EMPTY_PASSWORD = 'Пустое поле пароля.';
    const ERROR_EMPTY_SECONDARY_PASSWORD = 'Пустое поле с повтором пароля.';

    const ERROR_INCORRECT_EMAIL = 'Email содержит недопустимые символы или некорректен.';
    const ERROR_EMAIL_EXISTS = 'Этот email уже занят другим пользователем. Попробуйте выбрать другой.';
    const ERROR_PASSWORDS_NOT_MATCH = 'Пароли не совпадают.Проверьте правильность обеих полей.';
    const ERROR_PASSWORD_IS_TO_SHORT = 'Пароль содержит менее 6 символов. Он должен быть больше 6 символов и не больше 30.';

    const USER_NOT_EXISTS = 'Пользователя с таким username и паролем не существует. Проверьте Ваш ввод и попробуйте заново.';
}