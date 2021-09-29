<?php
    include_once('controller/student_photo_controller.php');
    $id = $_POST['id'];
    $stu = new StuPhotoController();
    $stu->deletePhoto($id);
    $results = $stu->showAllPhoto();

    $output="";
    foreach($results as $result){
        //Variable Type
        $output.= "<tr>";
        $output.= "<td><img src='upload/stuphoto/".$result['photo_dir']."' width='150px'></td>";
        $output.= "<td>".$result['name']."</td>";
        $output.= "<td>".$result['year']."</td>";
        $output.= "<td>".$result['distinction']."</td>";
        $output.= "<td id=".$result['id'].">
        <a href='viewStudPhoto.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
        <a href='editStudPhoto.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
        <button class='btn btn-danger stuphoto-delete'><i class='fa fa-trash'></i></button>
        </td>";
        $output.= "</tr>";
        //Array Type(Json Type)
        //$output=json_encode($result);
        
    }
    echo $output;
 ?>