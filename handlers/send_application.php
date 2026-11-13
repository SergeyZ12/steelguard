<?php

require_once DIR . "/../config/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Неверный метод запроса.");
}

$name = trim($_POST["name"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$comment = trim($_POST["comment"] ?? "");

if ($name === ""  $phone === ""  $comment === "") {
    exit("Заполните все поля формы.");
}

if (
    mb_strlen($name) > 100 ||
    mb_strlen($phone) > 30 ||
    mb_strlen($comment) > 2000
) {
    exit("Слишком длинные данные.");
}

$sql = "INSERT INTO applications (name, phone, comment)
        VALUES (?, ?, ?)";

$stmt = mysqli_prepare($mysqli, $sql);

if (!$stmt) {
    error_log(mysqli_error($mysqli));
    http_response_code(500);
    exit("Ошибка подготовки запроса.");
}

mysqli_stmt_bind_param($stmt, "sss", $name, $phone, $comment);

if (mysqli_stmt_execute($stmt)) {
    echo "Заявка успешно отправлена!";
} else {
    error_log(mysqli_stmt_error($stmt));
    http_response_code(500);
    echo "Не удалось отправить заявку. Попробуйте позже.";
}

mysqli_stmt_close($stmt);
mysqli_close($mysqli);

?>
