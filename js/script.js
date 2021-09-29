function triggerClick(){
    document.querySelector('#profileImage').click();
}


function validateFileType(fname){
    if (fname=="jpg" || fname=="jpeg" || fname=="png"){
        return true;
    }else{
        return false;
        
    }   
}

function displayImage(e){
    if(e.files[0]){
       // if(validateFileType(e.files[0].name)){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
       // }
        /*else{
            alert("Only jpg/jpeg and png files are allowed!");
        }*/
        
    }
}

