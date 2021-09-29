$('.announce-delete').click(function(){
    var result = confirm("Are you sure to delete the announcement?");
    if(result)
    {
        var id=$(this).parent('td').attr('id');
        $.ajax({
            //Link
            url:"deleteAnnounce.php",
            //Method type
            type:"POST",
            //Parameter values
            data:{id:id},
            //Error Function
            error:function(){
                alert("Fail to delete");
            },
            //Success Function
            //data=return value
            success:function(data){
                $('#tablebody').html(data);
            }
        });
    }
});