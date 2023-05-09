<?php
  $persons = $pdo->query("SELECT person.Id, person.FullName FROM person JOIN career ON person.Career = career.Id WHERE career.Name = 'Режиссер'")->fetchAll(PDO::FETCH_ASSOC);
  $genres = $pdo->query("SELECT * FROM genre")->fetchAll(PDO::FETCH_ASSOC);
?>


<div id="movies">
      <!-- Форма создания фильма -->
      <h2>Добавление фильма</h2>
      <form id="createMovieForm" method="POST" action="process_form.php?NameForm=InsertMovie">
        <!-- Поля формы для ввода информации о фильме -->
        <input type="text" name="movieTitle" placeholder="Название фильма" required>
        <!-- ref  -->
        <select name="MovieGenres">
            <?php foreach ($genres as $genre) { ?>
                <option value="<?= $genre['Id']; ?>">
                    <?= $genre['Name']; ?>
                </option>
            <?php } ?>
        </select>
        <input type="number" name="movieAgeToView" placeholder="Минимальный возраст" required>
        <input type="date" name="movieYearOfIssue" placeholder="Год Выпуска" required>
        <!-- ref  -->
        <select name="MoviePersons">
            <?php foreach ($persons as $person) { ?>
                <option value="<?= $person['Id']; ?>">
                    <?= $person['FullName']; ?>
                </option>
            <?php } ?>
        </select>

        <input type="number" name="movieScore" placeholder="Оценка" required>
        <input type="text" name="movieDescription" placeholder="Описание" >
        <!-- и другие поля формы -->
        <button type="submit">Добавить фильм</button>
      </form>
  </div>