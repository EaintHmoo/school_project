

$(document).ready(function(){
    
    $('.gallery-delete').click(function(){
        var result = confirm("Are you sure to delete the photo?");
        if(result)
        {
            var id=$(this).parent('td').attr('id');
            $.ajax({
                //Link
                url:"deleteGallery.php",
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
    $('.jobform-delete').click(function(){
        console.log('hi')
        var result = confirm("Are you sure to delete the job form?");
        if(result)
        {
            var id=$(this).parent('td').attr('id');
            $.ajax({
                //Link
                url:"deleteJobForm.php",
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
    
    $('.stuform-delete').click(function(){
        var result = confirm("Are you sure to delete the student?");
        if(result)
        {
            var id=$(this).parent('td').attr('id');
            $.ajax({
                //Link
                url:"deleteStudentForm.php",
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

    $('.stuphoto-delete').click(function(){
        var result = confirm("Are you sure to delete the student photo?");
        if(result)
        {
            var id=$(this).parent('td').attr('id');
            $.ajax({
                //Link
                url:"deleteStudPhoto.php",
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
}); 