$(document).on('click', '.editButton', function() {
  console.log(122);
  var editmovieid = $(this).data('movieid');
  // Перенаправление на отдельную страницу для редактирования с передачей параметра movieId
  window.location.href = 'update_movie.php?movieId=' + editmovieid;
});

$(document).on('click', '.deleteButton', function() {
  var movieId = $(this).data('movieid');
  var confirmation = confirm("Вы уверены, что хотите удалить этот фильм?");
  if (confirmation) {
    $.ajax({
      url: 'delete_movie.php',
      type: 'POST',
      data: { movieId: movieId },
      success: function(response) {
        var result = JSON.parse(response);
        if (result.success) {
          console.log(result.message); // Вывод сообщения об успешном удалении
          location.reload(); // Перезагрузка страницы после удаления
        } else {
          console.log(result.message); // Вывод сообщения об ошибке удаления
        }
      },
      error: function(xhr, status, error) {
        // Обработка ошибок
        console.log(xhr.responseText);
      }
    });
  }
});
