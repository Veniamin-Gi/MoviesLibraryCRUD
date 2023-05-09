<?php
require("db.php");

$movies = $pdo->query("SELECT movies.Id, movies.Name, genre.Name AS GenreName, 
  movies.AgeToView, movies.YearOfIssue, person.FullName AS ProducerName, 
  movies.Score, movies.Description FROM movies 
  JOIN genre ON movies.Genre = genre.Id 
  JOIN person ON movies.Producer = person.Id;")->fetchAll(PDO::FETCH_ASSOC); 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
  <script src="Scripts/index.js"></script>
  <link rel="stylesheet" href="Styles/index.css">
  <title>Моя библиотека фильмов</title>
</head>
<body>
  <!-- Шапка -->
  <header>
    <nav>
      <ul>
        <li><a href="/admin.php">Admin</a></li>
      </ul>
    </nav>
  </header>
  
  <!-- Основная область -->
  <main>
   
  <!-- #Создать список фильмов из БД -->

    <div id="filmList">

      <div class="film">
        <?php foreach($movies as $movie) { ?>
          <h3><?=$movie['Name'];?></h3>
          <p>Минимальный возраст: <?=$movie['AgeToView'];?></p>
          <p>Жанр: <?=$movie['GenreName'];?></p>
          <p>Дата выпуска: <?=$movie['YearOfIssue'];?></p>
          <p>Оценка: <?=$movie['Score'];?></p>
          <p>Продюсер: <?=$movie['ProducerName'];?></p>
          <!-- Актеры -->
          <?php 
          $id = $movie['Id'];
          $actors = $pdo->query("SELECT person.FullName FROM `movieactors` 
            JOIN person ON movieactors.ActorId = person.Id 
            WHERE movieactors.MovieId = $id")->fetchAll(PDO::FETCH_ASSOC); 
          if (!empty($actors)) {?>
            <p>Актеры:</p>
            <ul>
                <?php foreach ($actors as $actor) : ?>
                    <li><?= $actor['FullName']; ?></li>
                <?php endforeach; ?>
            </ul>
          <?php } ?>
    
          <p>Описание: <?=$movie['Description'];?></p>
          <button class="editButton" data-movieid="<?=$movie['Id'];?>">Редактировать</button>
          <button class="deleteButton" data-movieid="<?=$movie['Id'];?>">Удалить</button>
        <?php } ?>
      </div>
      
    </div>
  </main>
</body>
</html>


