<?php
require("db.php");

// параметр из запроса
$NameForm = $_GET['NameForm'];

//создание запроса вставки жанра
if ($NameForm == 'InsertGenre')
{
    $GenreName = $_POST['GenreName'];
    $GenreDescription = $_POST['GenreDescription'];
    $query = "INSERT INTO genre (Name, Description) VALUES ('$GenreName', '$GenreDescription')";

    $Location = 'admin.php';
}

//создание запроса вставки проф.
if ($NameForm == 'InsertCarrer')
{
    $CarrerName = $_POST['CarrerName'];
    $CarrerDescription = $_POST['CarrerDescription'];
   
    $query = "INSERT INTO career (Name, Description) VALUES ('$CarrerName', '$CarrerDescription')";

    $Location = 'admin.php';
}

//создание запроса вставки людей
if ($NameForm == 'InsertPersons')
{
    $PersonFirstName = $_POST['PersonFirstName'];
    $PersonSurname = $_POST['PersonSurname'];
    $FullName = $PersonFirstName . " " . $PersonSurname;
    $PersonCareer = $_POST['PersonCareer'];
    
    $query = "INSERT INTO person (FullName, FirstName, Surname, Career) VALUES ('$FullName', '$PersonFirstName', '$PersonSurname', '$PersonCareer')";

    $Location = 'admin.php';
}

//создание запроса вставки фильмов
if ($NameForm == 'UpdateMovie')
{
    $movieId = $_POST['movieId'];
    $Name = $_POST['movieTitle'];
    $Genre = $_POST['MovieGenres'];
    $AgeToView = $_POST['movieAgeToView'];
    $YearOfIssue = $_POST['movieYearOfIssue'];
    $Producer = $_POST['MoviePersons'];
    $Score = $_POST['movieScore'];
    $Description = $_POST['movieDescription'];

    // Проверка существования режиссера с указанным идентификатором
    $directorQuery = "SELECT * FROM person WHERE Id = $Producer";
    $directorResult = $pdo->query($directorQuery)->fetch(PDO::FETCH_ASSOC);
    if (!$directorResult) {
        echo "Режиссер не найден";
        exit;
    }

    $query = "UPDATE movies SET `Name` = '$Name', `Genre` = '$Genre', `AgeToView` = '$AgeToView', 
        `YearOfIssue` = '$YearOfIssue', `Producer` = '$Producer', `Score` = '$Score', `Description` = '$Description' 
        WHERE `Id` = '$movieId'";

    $Location = 'index.php';
}

// обновление фильма todo
if ($NameForm == 'InsertMovie')
{
    $Name = $_POST['movieTitle'];
    $Genre = $_POST['MovieGenres'];
    $AgeToView = $_POST['movieAgeToView'];
    $YearOfIssue = $_POST['movieYearOfIssue'];
    $Producer = $_POST['MoviePersons'];
    $Score = $_POST['movieScore'];
    $Description = $_POST['movieDescription'];
    
    $query = "INSERT INTO movies (Name, Genre, AgeToView, YearOfIssue, Producer, Score, Description) 
        VALUES ('$Name', '$Genre', '$AgeToView', '$YearOfIssue', '$Producer', '$Score', '$Description')";
    
    $Location = 'admin.php';
}

//создание связки фильма и актера
if ($NameForm == 'InsertMovieActor')
{
    $MovieId = $_POST['Movie'];
    $ActorId = $_POST['Actor'];
    
    $query = "INSERT INTO `movieactors` (`MovieId`, `ActorId`) VALUES ($MovieId, $ActorId)";
    $Location = 'admin.php';
}

// исполнение запроса 
$stmt = $pdo->query($query);
if ($stmt) {
    echo 'Запись успешно создана';
} else {
    $errorInfo = $pdo->errorInfo();
    echo 'Ошибка при создании записи: ' . $errorInfo[2];
}


header("Location: $Location");
exit;

?>