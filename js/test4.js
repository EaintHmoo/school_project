document.getElementById('editStudPhotoDisplay').addEventListener('click',function(e){
    document.querySelector('#editStudPhoto').click();
});
function displayEditStudPhoto(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#editStudPhotoDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}