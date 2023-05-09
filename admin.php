<?php require("db.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="Styles/index.css">
  <title>Моя библиотека фильмов</title>
</head>
<body>

  <!-- Шапка -->
  <header>
    <nav>
      <ul>
        <li><a href="/index.php">Home</a></li>
      </ul>
    </nav>
  </header>

  <!-- Основная область -->
  <main>
  
    <?php
    // *Отличие require от include, если произойдет ошибка include продолжит скрипт*
      $AdminDir = 'adminModules';
      include $AdminDir . '/admin_Carrer.php'; // Профессии
      include $AdminDir . '/admin_Person.php'; // Физ. лица
      include $AdminDir . '/admin_Genre.php'; // Жанры
      include $AdminDir . '/admin_Movie.php'; // Фильмы
      include $AdminDir . '/admin_MovieActors.php'; // Актер и фильм в котором он играет   
 
    ?>

  </main>
</body>
</html>
