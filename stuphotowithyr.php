<?php
//get all Photo
include_once 'controller/student_photo_controller.php';
$year=$_POST['year'];
$sController = new StuPhotoController();
$results = $sController->showPhotoWithYr($year);

$output="";
$output.="<div class='carousel-item active'>";
$output.="<div class='container'>";
$output.="<div class='row'>";
        
          foreach($results as $key=>$value)
          {
              //if we can divide $key by 8 without remainder
              if (($key+1) % 9 == 0) 
              {
                  $output.="</div>";
                  $output.="</div>";
                  $output.="</div>";
                  $output.="<div class='carousel-item'>";
                  $output.="<div class='container'>";
                  $output.="<div class='row'>";
              }
              $output.="<div class='col-sm-6 col-md-3'>";
              $output.="<div class='card'>";
              $output.="<img src='upload/stuphoto/".$value['photo_dir']."' class='card-img-top img-fluid'>";
              $output.="<div class='card-body text-center'>";
              $output.="<h4>".$value['name']."</h4>";
              $output.=$value['exam_no']."<br>";
              $output.=$value['year']."<br>";
              $output.=$value['distinction'];
              $output.="</div></div></div>";
              
          }
          $output.="</div>";  
          $output.="</div>";
          $output.="</div>";
echo $output;
?>