document.getElementById('yourImgDisplay').addEventListener('click',function(e){
    document.querySelector('#yourImg').click();
});
function displayImage1(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#yourImgDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}

document.getElementById('eduImgDisplay').addEventListener('click',function(e){
    document.querySelector('#eduImg').click();
});

function displayImage2(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#eduImgDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
} 


