document.getElementById('announceEditPhotoDisplay').addEventListener('click',function(e){
    document.querySelector('#announceEditPhoto').click();
});
function displayAnnunceEditImage(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#announceEditPhotoDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}