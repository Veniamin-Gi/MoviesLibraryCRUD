<div id="Gernes">
     <!-- Форма создания жанра -->
      <h2>Добавление жанра</h2>
      <form id="createGenreForm" method="POST" action="process_form.php?NameForm=InsertGenre">
        <!-- Поля формы для ввода информации о жанре -->
        <input type="text" name="GenreName" placeholder="Название жанра" required>
        <input type="text" name="GenreDescription" placeholder="Описание жанра">
        <!-- и другие поля формы -->
        <button type="submit">Создать жанр</button>
      </form>
</div>