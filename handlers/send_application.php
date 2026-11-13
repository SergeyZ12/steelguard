<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.html");
    exit;
}

$name = trim($_POST["name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$comment = trim($_POST["comment"] ?? "");

if ($name === ""  $phone === ""  $comment === "") {
    exit("Заполните все поля формы.");
}

if (mb_strlen($name) > 100  mb_strlen($phone) > 30  mb_strlen($comment) > 2000) {
    exit("Слишком длинные данные.");
}

echo "Заявка успешно получена!<br>";
echo "Имя: " . htmlspecialchars($name, ENT_QUOTES, "UTF-8") . "<br>";
echo "Телефон: " . htmlspecialchars($phone, ENT_QUOTES, "UTF-8") . "<br>";
echo "Комментарий: " . nl2br(htmlspecialchars($comment, ENT_QUOTES, "UTF-8"));

?>