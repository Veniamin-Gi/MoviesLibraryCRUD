<?php
require("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение переданных данных
    $movieId = $_POST['movieId'];

    $query = "DELETE FROM `movieactors` WHERE `movieactors`.`MovieId` = $movieId";

    $stmt = $pdo->query($query);
    if ($stmt) {
        echo 'Удалена связка фильм и актер';
    } else {
        $errorInfo = $pdo->errorInfo();
        echo 'Ошибка при удаление: ' . $errorInfo[2];
    }

    $query = "DELETE FROM `movies` WHERE `movies`.`Id` = $movieId";
    $stmt = $pdo->query($query);
    if ($stmt) {
        echo 'Удален Фильм';
    } else {
        $errorInfo = $pdo->errorInfo();
        echo 'Ошибка при удаление: ' . $errorInfo[2];
    }


    // Пример обработки успешного удаления фильма
    $response = array('success' => true, 'message' => 'Фильм успешно удален');
    echo json_encode($response);
} else {
    // Возвращение ошибки, если запрос не является POST-запросом
    http_response_code(400);
    $response = array('success' => false, 'message' => 'Некорректный запрос');
    echo json_encode($response);
}

header("Location: index.php");
exit;
?>