document.getElementById('announcePhotoDisplay').addEventListener('click',function(e){
    document.querySelector('#announcePhoto').click();
});
function displayAnnunceImage(e){
    if(e.files[0]){
       
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#announcePhotoDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
        
    }
}