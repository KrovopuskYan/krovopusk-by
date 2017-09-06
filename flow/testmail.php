<?php

// Сообщение

$message = "test php mail";

// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()

$message = wordwrap($message, 70);

// Отправляем

mail('webmaster@flowerstudio.by', 'My Subject', $message);

?>