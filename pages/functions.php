<?php

function register($login, $pass, $email) {
    // trim() - позволяет обрезать в начале и конце строки пробелы, табуляции, переход на строку
    // htmlspecialchars() - Преобразует специальные символы в HTML-сущности, т.е. & -> &amp;
    $login = trim(htmlspecialchars($login));
    $pass = trim(htmlspecialchars($pass));
    $email = trim(htmlspecialchars($email));

    if($login === '' || $pass === '' || $email === '') {
        echo '<h3 class="text-danger">Fill all inputs</h3>';
        return false;
    }

    if(strlen($login) < 3 || strlen($login) > 20 || strlen($pass) < 3 || strlen($pass) > 20) {
        echo '<h3 class="text-danger">Number of characters from 3 to 20</h3>';
        return false;
    }




    // занесение данных в текстовый файл
    // ключи:
    // + - если файл не созда, то создать его
    // a(append) - добавить в конец файла
    // w(write) - открыть за запись и затереть старые данные
    // r(read) - открыть на чтение
    $file = fopen('pages/users.txt', 'a+');

    // проверка на дублирование $login
    // fgets - построчно считывает файл
    while($line = fgets($file)) {
        // $readname = substr($line, 0, strpos($line, ':')); // ВАРИАНТ 1-получаем login из строки.
        // explode() - разбивает строку по символу создавая массив
        $line_array = explode(':', trim($line));
        $readname = $line_array[0]; // 0 - логин, 1 - пароль, 2 - почта
        $reademail = $line_array[2];

        if($readname === $login || $reademail === $email) {
            echo '<h3 class="text-danger">Login or Email is exist</h3>';
            return false;
        }
    }

    // md5() - захешировать пароль (в реальных проектах не исп. для шифрования паролей!)
    $line = "{$login}:".md5($pass).":{$email}\r\n";
    fputs($file, $line);
    fclose($file);
    return true;
}