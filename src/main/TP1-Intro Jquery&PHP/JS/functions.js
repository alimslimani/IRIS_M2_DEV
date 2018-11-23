function showGames() {
    $.ajax
    (
        {
            type: "GET",
            url: "../PHP/page2V2.php",
            date: "id=" + $('#lstCateg').val(),
            // # pour un id
            // . pour une classe
            success: function (data) {
                $('#divJeux').empty();
                $('#divJeux').append(data);
            },
            error: function () {
                alert("Error when try to show games");
            }
        }
    )
}