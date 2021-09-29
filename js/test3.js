
document.getElementById('studPhotoDisplay').addEventListener('click',function(e){
    document.querySelector('#studPhoto').click();
});
function displayStudPhoto(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#studPhotoDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}

