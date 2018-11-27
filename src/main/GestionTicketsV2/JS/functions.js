function afficher(id){
    $.ajax(
        {
            type:"get",
            url:"page2.php",
            data:"idUser="+id,
            success:function(data){
                $('#divTicket').empty();
                $('#divTicket').append(data);
            },
            error:function(){
                alert("Error when try to show tickets");
            }
        }
    );
}
