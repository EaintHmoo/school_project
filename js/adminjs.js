
$(document).ready(function(){
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

}); 