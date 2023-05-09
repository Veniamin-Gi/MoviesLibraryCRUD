<?php
$careers = $pdo->query("SELECT * FROM career")->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="Persons">
    <!-- Форма создания физ. лиц -->
    <h2>Создание физ. лица</h2>
    <form id="createPersonsForm" method="POST" action="process_form.php?NameForm=InsertPersons">
        <!-- Поля формы для ввода информации о физическом лице -->
        <input type="text" name="PersonFirstName" placeholder="Имя" required>
        <input type="text" name="PersonSurname" placeholder="Фамилия">
        
        <!-- Выпадающий список для выбора профессии -->
        <select name="PersonCareer">
            <?php foreach ($careers as $career) { ?>
                <option value="<?= $career['Id']; ?>">
                    <?= $career['Name']; ?>
                </option>
            <?php } ?>
        </select>
        
        <!-- Другие поля формы -->
        
        <button type="submit">Создать физ. лицо</button>
    </form>
</div>
