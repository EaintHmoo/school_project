<?php

//get all Photo
include_once 'controller/gallery_controller.php';
$type=$_POST['type'];
$gControler = new GalleryController();
$results = $gControler->showActivitePhoto($type);

$output="";
foreach($results as $result){
    //Variable Type
    $output.="<div class='col-md-3 col-sm-6'>";
    $output.="<div class='card'>";
    $output.="<img src='upload/gallery/".$result["photo_dir"]."' class='card-img-top img-fluid' alt='pyinnyaryadanar'>";   
    $output.="<div class='card-body'>";               
    $output.="<h5 class='card-title'>".$result['caption']."</h5>";                
    $output.="<p class='card-text'>".$result['description']."</p>";                  
    $output.="</div></div></div>";                 
    
    //Array Type(Json Type)
    //$output=json_encode($result);
    
}
echo $output;
?>