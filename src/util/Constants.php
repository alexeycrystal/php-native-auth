<?php

namespace Util;

class Constants
{
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
}