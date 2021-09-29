
//Image Preview Before Uploaded to Database
function triggerClick1(){
    document.querySelector('#yourImg').click();
}

function displayImage1(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#yourImgDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}
function triggerClick2(){
    document.querySelector('#eduImg').click();
}

function displayImage2(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#eduImgDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}
//get all photo from gallery
$('.all').click(function(){
        $.ajax({
            //Link
            url:"allphoto.php",
            //Method type
            type:"POST",
            //Error Function
            error:function(){
                alert("Fail to delete");
            },
            //Success Function
            //data=return value
            success:function(data){
                /*$output=JSON.parse(data);
                console.log($output.id);
                console.log($output.name);*/

                $('#activities').html(data);
            }
        });
});

//get donation photo from gallery
$('.donation').click(function(){
    $.ajax({
        //Link
        url:"photowithtype.php",
        //Method type
        type:"POST",
        //Parameter values
        data:{type:"donation"},
        //Error Function
        error:function(){
            alert("Fail to delete");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#activities').html(data);
        }
    });
});

//get ceremony photo from gallery
$('.ceremony').click(function(){
    $.ajax({
        //Link
        url:"photowithtype.php",
        //Method type
        type:"POST",
        //Parameter values
        data:{type:"ceremony"},
        //Error Function
        error:function(){
            alert("Fail to delete");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#activities').html(data);
        }
    });
});

//get sport photo from gallery
$('.sport').click(function(){
    $.ajax({
        //Link
        url:"photowithtype.php",
        //Method type
        type:"POST",
        //Parameter values
        data:{type:"sport"},
        //Error Function
        error:function(){
            alert("Fail to delete");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#activities').html(data);
        }
    });
});

//get trip photo from gallery
$('.trip').click(function(){
    $.ajax({
        //Link
        url:"photowithtype.php",
        //Method type
        type:"POST",
        //Parameter values
        data:{type:"trip"},
        //Error Function
        error:function(){
            alert("Fail to delete");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#activities').html(data);
        }
    });
});

//get donation photo from gallery
$('.others').click(function(){
    $.ajax({
        //Link
        url:"otherphoto.php",
        //Method type
        type:"POST",
        //Error Function
        error:function(){
            alert("Fail to delete");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#activities').html(data);
        }
    });
});

//get all photo from student
$('.all-stu').click(function(){
    $.ajax({
        //Link
        url:"allstuphoto.php",
        //Method type
        type:"POST",
        //Error Function
        error:function(){
            alert("Fail to call");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#stu-caro').html(data);
        }
    });
});

//get all photo from student
$("#stu-yr li").click(function() {
    var yr = $(this).attr("data-src");
    document.getElementById('dropdownMenuButton1').textContent = yr;
    $.ajax({
        //Link
        url:"stuphotowithyr.php",
        //Method type
        type:"POST",
        //Parameter values
        data:{year:yr},
        //Error Function
        error:function(){
            alert("Fail to call");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#stu-caro').html(data);
        }
    });
});

var input = document.getElementById("searchinput");
input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("seachbtn").click();
    }
});

function searchName(e){
    var value = document.getElementById("searchinput").value;
    $.ajax({
        //Link
        url:"stuphotowithname.php",
        //Method type
        type:"POST",
        //Parameter values
        data:{name:value},
        //Error Function
        error:function(){
            alert("Fail to call");
        },
        //Success Function
        //data=return value
        success:function(data){
            /*$output=JSON.parse(data);
            console.log($output.id);
            console.log($output.name);*/

            $('#stu-caro').html(data);
        }
    });
}