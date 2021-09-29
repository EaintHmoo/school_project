    document.getElementById('photoDisplay').addEventListener('click',function(e){
        document.querySelector('#photo').click();
    });
    
    function displayImage3(e){
        console.log('hi');
        if(e.files[0]){
           
            var reader = new FileReader();
    
            reader.onload = function(e){
                document.querySelector('#photoDisplay').setAttribute('src',e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
            
        }
    }
