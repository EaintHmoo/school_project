<?php
    include_once('controller/gallery_controller.php');
    $id = $_POST['id'];
    $gallery = new galleryController();
    $gallery->deletePhoto($id);
    $results = $gallery->showGallerys();

    $output="";
    foreach($results as $result){
        //Variable Type
        $output.= "<tr>";
        $output.= "<td><img src='upload/gallery/".$result['photo_dir']."' width='150px'></td>";
        $output.= "<td>".$result['type']."</td>";
        $output.= "<td>".$result['caption']."</td>";
        $output.= "<td id=".$result['id'].">
        <a href='viewGallery.php?id=".$result['id']."' class='btn btn-success'><i class='fa fa-eye'></i></a>
        <a href='editGallery.php?id=".$result['id']."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
        <button class='btn btn-danger gallery-delete'><i class='fa fa-trash'></i></button>
        </td>";
        $output.= "</tr>";
        //Array Type(Json Type)
        //$output=json_encode($result);
        
    }
    echo $output;
 ?>