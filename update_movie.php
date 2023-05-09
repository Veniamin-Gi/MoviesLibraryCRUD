<?php require("db.php"); 

$persons = $pdo->query("SELECT person.Id as Id, person.FullName as FullName FROM person JOIN career ON person.Career = career.Id WHERE career.Name = 'Режиссер'")->fetchAll(PDO::FETCH_ASSOC);
$genres = $pdo->query("SELECT * FROM genre")->fetchAll(PDO::FETCH_ASSOC);
 
$moveID = $_GET['movieId'];
// Получение данных фильма по его идентификатору
$movies = $pdo->query("SELECT * FROM movies WHERE Id = $moveID")->fetchAll(PDO::FETCH_ASSOC);

// Проверка наличия фильма с указанным идентификатором
if (!$movies) {
  echo "Фильм не найден";
  exit;
}

$movie = $movies[0];

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Моя библиотека фильмов</title>
  <link rel="stylesheet" href="Styles/index.css">
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
  
  <div id="movies">
      <!-- Форма создания фильма -->
      <h2>Добавление фильма</h2>
      <form id="updateMovieForm" method="POST" action="process_form.php?NameForm=UpdateMovie">
      <!-- ID фильма для редактирования -->
      <input type="hidden" name="movieId" value="<?= $movie['Id'] ?>">
        <!-- Поля формы для ввода информации о фильме -->
        <input type="text" name="movieTitle" placeholder="Название фильма" value="<?= $movie['Name'] ?>" required>
        <!-- ref  -->
        <select name="MovieGenres">
            <?php foreach ($genres as $genre) { ?>
              <option value="<?= $genre['Id']; ?>" <?php if ($genre['Id'] == $movie['Genre']) echo 'selected'; ?>>
                    <?= $genre['Name']; ?>
                </option>
            <?php } ?>
        </select>
        <input type="number" name="movieAgeToView" placeholder="Минимальный возраст" value="<?= $movie['AgeToView'] ?>" required>
        <input type="date" name="movieYearOfIssue" placeholder="Год Выпуска" value="<?= $movie['YearOfIssue'] ?>" required>
        <!-- ref  -->
        <select name="MoviePersons">
            <?php foreach ($persons as $person) { ?>
              <option value="<?= $person['Id']; ?>" <?php if ($person['Id'] == $movie['Producer']) echo 'selected'; ?>>
                    <?= $person['FullName']; ?>
                </option>
            <?php } ?>
        </select>

        <input type="number" name="movieScore" placeholder="Оценка" value="<?= $movie['Score'] ?>" required>
        <input type="text" name="movieDescription" placeholder="Описание" value="<?= $movie['Description'] ?>" >
        <!-- и другие поля формы -->
        <button type="submit">Обновить фильм</button>
      </form>
  </div>

  </main>
</body>
</html>