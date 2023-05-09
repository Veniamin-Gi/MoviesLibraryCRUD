<?php
 $movies = $pdo->query("SELECT * FROM movies")->fetchAll(PDO::FETCH_ASSOC);
 $actors = $pdo->query("SELECT person.* FROM person JOIN career ON person.Career = career.Id WHERE career.Name = 'Актер'")->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="MovieActors">
     <!-- Форма создания таб. актер в фильме -->
      <h2>Добавляем актера в фильм</h2>
      <form id="createMovieActorForm" method="POST" action="process_form.php?NameForm=InsertMovieActor">
        <!-- Поля формы для ввода информации о жанре -->
        <!-- ref  -->
        <select name="Actor" required>
            <?php foreach ($actors as $actor) { ?>
                <option value="<?= $actor['Id']; ?>">
                    <?= $actor['FullName']; ?>
                </option>
            <?php } ?>
        </select>
        <!-- ref  -->
        <select name="Movie" required>
            <?php foreach ($movies as $movie) { ?>
                <option value="<?= $movie['Id']; ?>">
                    <?= $movie['Name']; ?>
                </option>
            <?php } ?>
        </select>
        <!-- и другие поля формы -->
        <button type="submit">Подтвердить</button>
      </form>
</div>