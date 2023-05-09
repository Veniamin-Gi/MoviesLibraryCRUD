<div id="Carrers">
     <!-- Форма создания профессий -->
      <h2>Добавление профессии киноиндустрии</h2>
      <form id="createCarrerForm" method="POST" action="process_form.php?NameForm=InsertCarrer">
        <!-- Поля формы для ввода информации о жанре -->
        <input type="text" name="CarrerName" placeholder="Название профессии" required>
        <input type="text" name="CarrerDescription" placeholder="Описание профессии">
        <!-- и другие поля формы -->
        <button type="submit">Создать профессию</button>
      </form>
</div>