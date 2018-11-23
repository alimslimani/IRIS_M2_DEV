function showTickets(id){
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/page.php",
            data:"id="+id,
            success: function(data){
                $('#divTicket').empty();
                $('#divTicket').append(data);
            },
            error: function(){
                    alert("Error when try to show tickets");
            }
        }
    )
}
